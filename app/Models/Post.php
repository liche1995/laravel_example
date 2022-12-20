<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class Post extends Model
{
    use HasFactory;
    use softDeletes;
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
    public function author()
    {
        return $this->belongsTo(User::class, 'users', 'id');
    }


    //encrypt
    public function getContentAttribute($content)
    {
        return decrypt($content);
    }
    
    public function setContentAttribute($content)
    {
        $this->attributes['content'] = encrypt($content);
    }

}
?>