<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultats extends Model
{
    use HasFactory;
    protected $fillable = [
        'datepub',
        'fichier'
    ];
    public function resultats()
    {
        return $this->hasMany(Resultats::class, 'id_personnels');
    }
}
