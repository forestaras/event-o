<table>
	@foreach($registers as $people)

	

	<tr>
		<td>3</td><!-- id -->
		<td>{{$people->updated_at}}</td><!-- Дата змін -->
		<td>{{$people->name}}</td><!-- Прізвище Імя-->
		<td>{{$people->grup}}</td><!-- Група -->
		<td></td><!-- Дистанція -->
		<td>{{$people->club}}</td><!-- Команда клуб -->
		<td></td><!-- команда уст -->
		<td></td><!-- етап ест -->
		<td>{{$people->si}}</td><!-- спортідент -->
		<td></td><!-- старт -->
		<td></td><!-- фініш -->
		<td></td><!-- статус -->
		<td></td><!-- результат -->
		<td></td><!-- очки -->
		<td></td><!-- місце -->
		<td></td> <!-- номер-->
		<td></td>
		<td></td>
		<td></td><!-- стартовий -->
		<td></td>
		<td></td>
		<td>{{ date('Y', strtotime($people->rik)) }}</td><!-- рік народження -->
		<td></td>
		<td></td>
		<td>{{ date('Y-m-d', strtotime($people->created_at)) }}</td><!-- дата заявки -->
		<td>{{ date('H:m:s', strtotime($people->created_at)) }}</td><!-- час заявки -->
		<td></td>
		<td>{{$people->obl}}</td>
		<td>{{$people->roz}}</td><!-- розряд -->
		<td></td>
		<td></td>
		<td>{{$people->trener}}</td><!-- тренер -->
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td>{{$people->dni}}</td>
	</tr>

	@endforeach
</table>
