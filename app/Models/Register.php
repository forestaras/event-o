<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Register
 *
 * @property $id
 * @property $peopleid
 * @property $eventid
 * @property $name
 * @property $trener
 * @property $club
 * @property $obl
 * @property $roz
 * @property $si
 * @property $rik
 * @property $grup
 * @property $dni
 * @property $datestop
 * @property $userid
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Register extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['peopleid','eventid','name','trener','club','obl','roz','si','rik','grup','dni','datestop','userid'];
    protected $table='register';



}
