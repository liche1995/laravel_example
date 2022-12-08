<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Post extends Model
{
    use HasFactory;
    //declear use table name, it must to setting
    protected $table = "post";

    protected $fillable = ["content",];
    protected $hidden = [];
    protected $casts = [];

    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }
}
?>