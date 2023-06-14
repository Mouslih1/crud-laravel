<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $table = 'etudiant';
    protected $fillable = ['nom', 'prenom', 'classes_id'];

    public function classes(){
        return $this->belongsTo(Classe::class);
    }
}
