<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //declear use table name, it must to setting
    protected $table = "post";

    protected $fillable = ["content",];
    protected $hidden = [];
    protected $casts = [];
}
?>