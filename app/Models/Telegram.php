<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telegram extends Model
{
   
    // static $rules = [
	// 	'userid' => 'required',
	// 	'oblid' => 'required',
	// 	'activ' => 'required',
	// 	'data_finish' => 'required',
	// 	'img' => 'required',
	// 	'text' => 'required',
    // ];

    // protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $table ='telegram';
    protected $fillable = ['username','name','user_id','updated_at', 'created_at'];
}
