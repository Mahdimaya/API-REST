<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Super_Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        "id","nom","prenom","email","num_tel","mot_de_passe"
    ];
}
