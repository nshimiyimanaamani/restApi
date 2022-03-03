<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo_manipulation extends Model
{
    use HasFactory;
     const TYPE_RESIZE='resize';
     const UPDATE_AT='false';
     protected $fillable =['name','path','type','data','output_path','user_id','album_id'];
}
