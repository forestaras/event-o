<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Event
 *
 * @property $id
 * @property $userid
 * @property $redactorid
 * @property $secretarid
 * @property $golsudid
 * @property $clubid
 * @property $oblid
 * @property $title
 * @property $text
 * @property $datastart
 * @property $datafinish
 * @property $org
 * @property $activ
 * @property $logo
 * @property $created_at
 * @property $updated_at
 * @property $contactid
 * @property $bul
 * @property $rez
 * @property $inf
 * @property $location
 * @property $contact_name
 * @property $contact_email
 * @property $contact_phone
 * @property $contact_fb
 * @property $contact_website
 * @property $stvoreno
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Event extends Model
{
    
    static $rules = [
		'userid' => 'required',
		'title' => 'required',
		'org' => 'required',
		'activ' => 'required',
		'stvoreno' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $table = 'event';
    // protected $fillable = ['userid','redactorid','secretarid','golsudid','clubid','oblid','title','text','datastart','datafinish','org','activ','logo','contactid','bul','rez','inf','location','contact_name','contact_email','contact_phone','contact_fb','contact_website','stvoreno'];

    
    public function obl()
    {
        return $this->belongsTo(Obl::class,'oblid','id');
    }
    public function club()
    {
        return $this->belongsTo(Club::class,'clubid');
    }
    public function registerseting()
    {
        return $this->hasMany(Registerseting::class,'eventid');
    }
    public function online()
    {
        return $this->hasMany(Online::class,'eventid');
    }

    public function evendop()
    {
        return $this->hasMany(Eventdop::class,'eventid');
    }
    // public function mc()
    // {
    //     return $this->hasOneThrough(Online::class, Mopcompetition::class,'cid','eventid');
    // }
    


}
