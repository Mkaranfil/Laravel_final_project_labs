<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    public function posts()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
    public function user_pictures()
    {
        return $this->belongsTo(UserPicture::class,'picture_id');
    }
}
