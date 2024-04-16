<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fonctions extends Model
{
    use HasFactory;

    protected $table = 'fonctions';

    protected $fillable = [
        'nom_fonctions'
    ];
}
