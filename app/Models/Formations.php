<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\FormationsController;

class Formations extends Model
{
    use HasFactory;
    protected $fillable = [
        'datedebut',
        'datefin',
        'lieu',
        'montant',
        'id_personnels'
    ];
    public function formations()
    {
        return $this->hasMany(Formations::class, 'id_personnels');
    }
}
