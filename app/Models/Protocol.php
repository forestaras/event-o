<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Protocol
 *
 * @property $id
 * @property $col1
 * @property $col2
 * @property $col3
 * @property $name1
 * @property $name2
 * @property $name3
 * @property $namedist
 * @property $inf_data
 * @property $inf_local
 * @property $nd
 * @property $gse
 * @property $gsu
 * @property $con
 * @property $cld
 * @property $cldr
 * @property $prot
 * @property $created_at
 * @property $updated_at
 * @property $formula

 * 
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Protocol extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */ 
    protected $fillable = ['col1','col2','col3','name1','name2','name3','namedist','inf_data','inf_local','nd','gse','gsu','con','cld','cldr','prot','formula','max','pol_roz_vik','pol_roz','pol_com','pol_tren','pol_rik','kom','kom_count_views','kom_count'];



}
