<?php

namespace App\Models\CP;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CPpointClass
 *
 * @property $id
 * @property $cid
 * @property $name
 * @property $cod
 * @property $ball
 * @property $all
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CPpointClass extends Model
{
    
    static $rules = [
		'cid' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cid','name','cod','ball','all'];



}
