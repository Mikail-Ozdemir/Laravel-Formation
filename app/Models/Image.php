<?php

namespace App\Models;

use App\Model\Post;
use App\Model\Artist;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function artist()
    {
    return $this->hasOne(Artist::class);
    }
}
