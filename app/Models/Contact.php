<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact'; // Spécifie explicitement le nom de la table

    protected $fillable = ['name', 'email', 'message']; // colonnes pouvant être remplies par le formulaire
}
