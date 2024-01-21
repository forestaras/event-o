<?php

namespace App\Models\CP;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CPcompetition
 *
 * @property $id
 * @property $name
 * @property $data
 * @property $pass
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CPcompetition extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','data','pass'];



}
