<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Mopcompetitor
 *
 * @property $cid
 * @property $id
 * @property $name
 * @property $org
 * @property $cls
 * @property $stat
 * @property $st
 * @property $rt
 * @property $tstat
 * @property $it
 * @property $si
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Mopcompetitor extends Model
{
    
    static $rules = [
		'cid' => 'required',
		'name' => 'required',
		'org' => 'required', 
		'cls' => 'required',
		'stat' => 'required',
		'st' => 'required',
		'rt' => 'required',
		'tstat' => 'required',
		'it' => 'required',
		'si' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cid','name','org','cls','stat','st','rt','tstat','it','si'];
    protected $table=('mopcompetitor');

    public function org($cid)
    {
        return $this->belongsTo(Moporganization::class,'id')->where('cid',$cid);
    }



}
