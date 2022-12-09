<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

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
        //belongsToMany([table models], [intermediary table name], [foreign key])
        return $this->belongsToMany(Tags::class, 'postandtag', 'tag_id');
    }
}
?>