<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mopcontrol
 *
 * @property $cid
 * @property $id
 * @property $name
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mopcontrol extends Model
{
    
    static $rules = [
		'cid' => 'required',
		'name' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cid','name'];
    protected $table=('mopcontrol');

    



}
