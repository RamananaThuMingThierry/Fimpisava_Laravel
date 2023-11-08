<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class filieres extends Model
{
    
    use HasFactory;

    protected $table = 'filieres';

    public $timestamps = false;

    protected $fillable = [
        'nom_filieres'
    ];
}
