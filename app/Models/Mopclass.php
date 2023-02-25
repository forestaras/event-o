<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mopclass
 *
 * @property $cid
 * @property $id
 * @property $name
 * @property $ord
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mopclass extends Model
{
    
    static $rules = [
		'cid' => 'required',
		'name' => 'required',
		'ord' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cid','name','ord'];
    protected $table='mopclass';



}
