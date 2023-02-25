<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Eventdop
 *
 * @property $id
 * @property $titlesilka
 * @property $eventid
 * @property $text
 * @property $userid
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Eventdop extends Model
{
    
    static $rules = [
		'titlesilka' => 'required',
		'eventid' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titlesilka','eventid','text','userid'];
    protected $table='eventdop';



}
