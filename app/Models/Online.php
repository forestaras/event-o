<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Online
 *
 * @property $id
 * @property $eventid
 * @property $userid
 * @property $name
 * @property $cod
 * @property $starovi
 * @property $startovioff
 * @property $rezult
 * @property $rezultoff
 * @property $startclok
 * @property $split
 * @property $splitanaliz
 * @property $stop
 * @property $datestart
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Online extends Model
{
    
    static $rules = [
		'eventid' => 'required',
		'userid' => 'required',
		'name' => 'required',
		'cod' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $table ='online';
    protected $fillable = ['eventid','userid','name','cod','starovi','comandni','rezult','rezult_formula_ball	','split','split_grafic','stop','datestart'];
    
    public function mopcompetition()
    {
        return $this->belongsTo(Mopcompetition::class,'id','cid');
    }



}
