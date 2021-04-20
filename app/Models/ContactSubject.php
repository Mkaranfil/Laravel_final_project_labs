<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSubject extends Model
{
    use HasFactory;
    public function contact_formulaires()
    {
        return $this->hasMany(ContactFormulaire::class, 'subject_id');
    }
}
