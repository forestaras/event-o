<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Registerseting
 *
 * @property $id
 * @property $eventid
 * @property $title
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
class Registerseting extends Model
{
    
    static $rules = [
		'eventid' => 'required',
		'title' => 'required',
		'trener' => 'required',
		'club' => 'required',
		'obl' => 'required',
		'roz' => 'required',
		'si' => 'required',
		'rik' => 'required',
		'grup' => 'required',
		'dni' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
	protected $fillable = ['eventid','title','trener','club','obl','roz','si','rik','grup','dni','datestop','userid'];
	protected $table = 'registerseting';

	public function register()
    {
        return $this->hasMany(Register::class,'eventid','id');
    }





}
