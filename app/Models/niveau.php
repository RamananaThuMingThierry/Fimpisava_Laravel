<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class niveau extends Model
{
    use HasFactory;

    protected $table = 'levels';

    protected $fillable = [
        'nom_niveau'
    ];
}
