<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestiPicture extends Model
{
    use HasFactory;
	public function testimonials()
	{
		return $this->hasMany(Testimonial::class, 'picture_id');
	}
}
