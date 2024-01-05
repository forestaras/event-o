<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPcompetitions extends Model
{
    protected $fillable = ['name', 'data', 'pass'];
    use HasFactory;
}
