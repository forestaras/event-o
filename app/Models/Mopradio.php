<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mopradio
 *
 * @property $cid
 * @property $id
 * @property $ctrl
 * @property $rt
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mopradio extends Model
{
    
    static $rules = [
		'cid' => 'required',
		'ctrl' => 'required',
		'rt' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cid','ctrl','rt'];
    protected $table=('mopradio');




}
