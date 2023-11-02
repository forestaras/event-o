<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Peoples extends Model
{
    

    protected $table ='people';
    protected $fillable = ['id','name','trener','club','clubid','roz','si','rik','grup','userid','acauntid'];
    
 


}
