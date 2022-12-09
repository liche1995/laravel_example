<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;

class tags extends Model
{
    use HasFactory;
    protected $table="tags";
    protected $fillable = ["tag",];
    protected $hidden = [];
    protected $casts = [];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'postandtag', 'post_id');
    }
}
