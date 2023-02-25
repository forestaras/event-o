<?php

/* Global variables */
$num_controls;

function formatTime($time) {
    $time = $time / 10;
    if ($time > 3600)
        return sprintf("%d:%02d:%02d", $time/3600, ($time/60)%60, $time%60);
    elseif ($time > 0)
        return sprintf("%2d:%02d", ($time/60)%60, $time%60);
    else
        return '0:00';
}

function getStatusString($status) {
    switch($status) {
	case 0:
	    return ""; //Unknown, running?
	case 1:
	    return "OK";
	case 20:
	    return "DNS"; // Did not start;
	case 3:
	    return "MP"; // Missing punch
	case 4:
	    return "DNF"; //Did not finish
	case 5:
	    return "DQ"; // Disqualified
	case 6:
	    return "OT"; // Overtime
	case 99:
	    return "NP"; //Not participating;
    }
}

/* Here is how the comparison function works:
 * Compare split times when they are at the same control (farthest along one they've both gone to)
 * - If person that has gone farther is ahead, farther is faster
 * - If person that has gone farther is behind, then
 *  - If time elapsed since control + nearer's time at control < farther's time at next control, then nearer is faster else farther is faster
 * - If both have gone same distance, whoever is faster
 *
 * return -1 if $a faster 1 if $b is faster
 */
function competitorComparison($a, $b) {
    if( $a['status'] != $b['status'] ) {
        return $a['status'] < $b['status'] ? -1 : 1;
    }

    /* Compare finish times if present */
    if( $a['time'] && $b['time'] ) {
        return ( $a['time'] < $b['time'] ) ? -1 : 1;
    }

    /* Seconds * 10 since midnight */
    $now = ( time() - strtotime("today") ) * 10;

    $num_controls = $GLOBALS['num_controls'];

    while ($num_controls-- && $num_controls >= 0) {
        if ( isset( $a[$num_controls] ) && isset( $b[$num_controls] ) ) {
            if( $num_controls + 1 == $GLOBALS['num_controls'] ) {
                /* Special case - comparing time at last radio control + elapsed time and time at finish */
                if( $a['time'] ) {
                    /* $a has gone farther */
                    if( $a[$num_controls] < $b[$num_controls] )
                        return -1;
                    return ( $a['time'] < $now - $b['start'] ) ? -1 : 1;
                } else if( $b['time'] ) {
                    /* $b has gone farther */
                    if( $b[$num_controls] < $a[$num_controls] )
                        return 1;
                    return ( $now - $a['start'] < $b['time'] ) ? -1 : 1;
                }
            } else {
                /* Special case - comparing time at previous radio control + elapsed time and time at radio control */
                if( isset( $a[$num_controls + 1] ) ) {
                    /* $a has gone farther */
                    if( $a[$num_controls] < $b[$num_controls] )
                        return -1;
                    return ( $a[$num_controls + 1] < $now - $b['start'] ) ? -1 : 1;
                } else if( isset( $b[$num_controls + 1] ) ) {
                    /* $b has gone farther */
                    if( $b[$num_controls] < $a[$num_controls] )
                        return 1;
                    return ( $now - $a['start'] < $b[$num_controls + 1] ) ? -1 : 1;
                }
            }
            /* Control farther along not visited, compare times at this control */
            return ( $a[$num_controls] < $b[$num_controls] ) ? -1 : 1;
        }
    }

    /* Special case - see if either made it to first control */
    if( isset( $a[0] ) ) {
        return -1;
    } else if( isset( $b[0] ) ) {
        return 1;
    }

    /* Compare start time */
    return ( $a['start'] < $b['start'] ) ? -1 : 1;
}
/* Uses $GLOBALS["control-comparison"] to compare for that control */
function competitorControlComparison($a, $b) {
    $i = $GLOBALS["control-comparison"];

    if( !isset( $a[$i . "-leg-time"] ) ) {
        return 1;
    } else if( !isset( $b[$i . "-leg-time"] ) ) {
        return -1;
    }

    return $a[$i . "-leg-time"] - $b[$i . "-leg-time"];
}

function organizeCompetitors($competitors, $punches, $controls) {
    /* Multi-dimensional array containing punches - pre-sorted from SQL */
    $individual_controls = array();
    $i = 0;
    foreach( $controls as $control ) {
        $individual_controls[$i] = array();
        foreach( $punches as $punch ) {
            if( $punch['ctrl'] == $control )
                $individual_controls[$i][] = $punch;
        }
        $i++;
    }

    /* Set global variable */
    $GLOBALS['num_controls'] = $i;

    /* Update competitor array with positions, times, and times behind*/
    foreach( $competitors as &$competitor ) {
        $i = 0;
        foreach( $individual_controls as $individual_control ) {
            $key = array_search( $competitor['id'], array_column( $individual_control, 'id' ) );
            if( $key === FALSE ) {
                $i++;
                continue;
            }
            $competitor[$i] = $individual_control[$key]['rt'];
            $competitor[$i . "-pos"] = $key + 1;
            $competitor[$i . "-behind"] = $competitor[$i] - $individual_control[0]['rt'];
            if( $i == 0) {
                $competitor[$i . "-leg-time"] = $individual_control[$key]['rt'];
            } else if( isset( $competitor[$i - 1] ) ) {
                $competitor[$i . "-leg-time"] = $competitor[$i] - $competitor[$i - 1];
            }

            $i++;
        }

        /* Calculate time behind winner, if finished */
        if( $competitor['time'] )
            $competitor['time-behind'] = $competitor['time'] - $competitors[0]['time'];
    }

    /* Calculate positions on each leg */
    $i = 0;
    for( $i = 0; $i < count( $individual_controls ); $i++ ) {
        $GLOBALS["control-comparison"] = $i;
        usort( $competitors, "competitorControlComparison");
        $j = 0;
        foreach( $competitors as &$competitor ) {
            if( isset( $competitor[$i . "-leg-time"] ) ) {
                $competitor[$i . "-leg-pos"] = ++$j;
            } else {
                break;
            }
        }
    }

    /* Sort the competitors array */
    usort( $competitors, "competitorComparison" );

    return $competitors;
}

function writeSplitsHeader($control_list) {
    $num_controls = count($control_list);

    for ($i = 0; $i < $num_controls; $i++)
        echo "<th colspan='2'>" . ($i + 1) . " (" . $control_list[$i] . ")</th>";
    echo "<th colspan='2'>Результат <br>Відст</th>";
    echo "<th colspan='2'>Імя <br>Клуб</th>";
}

function writeSplits($competitors, $num_controls) {
    $place = 0;
    foreach ($competitors as $row) {
        echo "<tr>";

        /* Place */
        if( $row['status'] == 1 )
            echo "<td class='left-aligned sticky-col first-col'>" . ++$place . "</td>";
        else
            echo "<td class='left-aligned sticky-col first-col'>" . getStatusString( $row['status'] ) . "</td>";

        /* Name and club */
        echo "<td class='left-aligned sticky-col second-col'>" . $row['name'] . "<br/>" . $row['team'] . "</td>";

        /* Start */
        echo '<td class="left-aligned times start" data-time="' . $row['start'] . '">' . formatTime( $row['start'] ) . "</td>";

        /* Splits for each control */
        for( $i = 0; $i < $num_controls; $i++ ) {
            $overall_class = "";
            $leg_class = "";
            if( isset( $row[$i . "-pos"] ) ) {
                $overall_class .= "rank-" . $row[$i . "-pos"];
            }
            if( isset( $row[$i . "-leg-pos"] ) ) {
                $leg_class .= "rank-" . $row[$i . "-leg-pos"];
            }

            if( isset( $row[$i] ) ) {
                if( isset( $row[$i . "-leg-time"] ) ) {
                    echo '<td class="times" data-time="'
                        . $row[$i]
                        . '"><span class="'
                        . $leg_class
                        . '">'
                        . formatTime($row[$i . "-leg-time"])
                        . '</span><br /><span class="'
                        . $overall_class
                        . '">'
                        . formatTime( $row[$i] )
                        . '</span></td>';
                } else {
                    echo '<td class="times" data-time="'
                        . $row[$i]
                        . '">&nbsp;<br /><span class="'
                        . $overall_class
                        . '">'
                        . formatTime( $row[$i] )
                        . '</span></td>';
                }

                if( isset( $row[$i . "-leg-pos"] ) )
                    echo '<td class="rank"><span class="'
                        . $leg_class
                        . '">('
                        . $row[$i . "-leg-pos"]
                        . ')</span><br />';
                else
                    echo '<td class="rank">&nbsp<br />';

                if( $row['status'] <= 1 ) {
                    echo '<span class="'
                        . $overall_class
                        . '">('
                        . $row[$i . "-pos"]
                        . ')</span></td>';
                } else {
                    echo '(-)</td>';
                }
            } else {
                echo '<td class="times"></td><td class="rank"></td>';
            }


        }



        /* And the finish! */
        if( $row['time'] ) {
            echo '<td class="times" data-time="'
                . $row['time']
                . '"><span class="rank-'
                . $place
                . '">'
                . formatTime( $row['time'] )
                . '<br />+'
                . formatTime( $row["time-behind"] )
                . '</span></td>';
            if( $row['status'] <= 1 )
                echo '<td class="rank"><span class="rank-'
                    . $place
                    . '">('
                    . $place
                    . ')</span></td>';
            else
                echo '<td class="rank"></td>';
        } else {
            echo '<td class="times"></td><td class="rank"></td>';
        }
        echo "<td colspan='2'>" . $row['name'] . "<br/>" . $row['team'] ."</td>"; //вказане імя в кінці  echo "<td class='left-aligned'>" . $row['name'] . "<br/>" . $row['team'] . "</td>";
        echo "</tr>";
    }
}
?>
