<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mopcompetition
 *
 * @property $cid
 * @property $id
 * @property $name
 * @property $date
 * @property $organizer
 * @property $homepage 
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mopcompetition extends Model
{
    
    static $rules = [
		'cid' => 'required',
		'name' => 'required',
		'date' => 'required',
		'organizer' => 'required',
		'homepage' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cid','name','date','organizer','homepage'];
    protected $table='mopcompetition';

    public function people()
    {
        return $this->hasMany(Mopcompetitor::class,'cid','cid');
    }



}
