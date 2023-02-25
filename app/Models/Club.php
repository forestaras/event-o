<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Club
 *
 * @property $id
 * @property $userid
 * @property $redactorid
 * @property $oblid
 * @property $title
 * @property $bigtitle
 * @property $activ
 * @property $logo
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Club extends Model
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
    protected $fillable = ['userid','redactorid','oblid','title','bigtitle','activ','logo'];
    protected $table="club";



}
