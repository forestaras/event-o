<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Moporganization 
 *
 * @property $cid
 * @property $id
 * @property $name
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Moporganization extends Model
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
    protected $table=('moporganization');



}
