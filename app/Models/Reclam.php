<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Reclam
 *
 * @property $id
 * @property $userid
 * @property $oblid
 * @property $activ
 * @property $data_finish
 * @property $img
 * @property $text
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Reclam extends Model
{
    
    static $rules = [
		'userid' => 'required',
		'oblid' => 'required',
		'activ' => 'required',
		'data_finish' => 'required',
		'img' => 'required',
		'text' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['userid','oblid','activ','data_finish','img','text','url','prioritet'];



}
