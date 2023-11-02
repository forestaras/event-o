<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telegram_log extends Model
{
  
   protected $table ='telegram_log';
   protected $fillable = ['name','user_id','st','rt','stat','updated_at', 'created_at'];
}
