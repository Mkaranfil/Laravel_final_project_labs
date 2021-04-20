<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactFormulaire extends Model
{
    use HasFactory;
    public function contact_subjects()
    {
        return $this->belongsTo(ContactSubject::class, 'subject_id');
    }
}
