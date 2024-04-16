<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membres extends Model
{
    use HasFactory;

    protected $table = 'membres';

    public $timestamps = false;

    protected $fillable = [
        'photo',
        'numero_carte',
        'nom',
        'prenom',
        'date_de_naissance',
        'lieu_de_naissance',
        'filieres_id',
        'niveau',
        'district',
        'genre',
        'adresse',
        'profession',
        'fonctions_id',
        'levels_id',
        'filires_id',
        'contact',
        'facebook',
        'contact_personnel',
        'contact_tuteur',
        'sympathisant',
        'date_inscription',
    ];
}