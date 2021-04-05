<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    public function testi_pictures()
    {
        return $this->belongsTo(TestiPicture::class, 'picture_id');
    }
}
