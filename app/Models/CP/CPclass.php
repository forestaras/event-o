<?php

namespace App\Models\CP;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CPclass
 *
 * @property $id
 * @property $cid
 * @property $name
 * @property $all
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CPclass extends Model
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
    protected $fillable = ['cid','name','all'];



}
