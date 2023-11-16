<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personnes extends Model
{
    use HasFactory;

    protected $table = 'personnes';

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
        'adresse',
        'profession',
        'fonction',
        'contact',
        'facebook',
        'telephone',
        'date_inscription',
    ];
}
