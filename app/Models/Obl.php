<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Obl
 *
 * @property $id
 * @property $userid
 * @property $redactorid
 * @property $title
 * @property $activ
 * @property $flag
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Obl extends Model
{
    
    static $rules = [
		'userid' => 'required',
		'title' => 'required',
		'activ' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['userid','redactorid','title','activ','flag'];
    protected $table="obl";
    



}
