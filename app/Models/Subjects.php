<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Relations as dbrelations;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subjects extends Model
{
    use HasFactory;
    protected $table = "subjects";

    protected $fillable = ["name",];
    protected $hidden = [];
    protected $casts = [];
    
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
?>