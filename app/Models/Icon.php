<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    use HasFactory;
    public function service_listes()
	{
		return $this->hasMany(ServiceListe::class);
	}
}

