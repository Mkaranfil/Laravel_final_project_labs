<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardPicture extends Model
{
    use HasFactory;
    public function service_cards()
	{
		return $this->hasMany(ServiceCard::class, 'picture_id');
	}
}
