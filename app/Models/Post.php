<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function categories()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function blog_pictures()
    {
        return $this->belongsTo(BlogPicture::class,'picture_id');
    }

    public function commentaires()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
