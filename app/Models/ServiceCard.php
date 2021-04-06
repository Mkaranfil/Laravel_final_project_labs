<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCard extends Model
{
    use HasFactory;
    public function card_pictures()
    {
        return $this->belongsTo(CardPicture::class, 'picture_id');
    }
}

