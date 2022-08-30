<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PersonnelsController;

class Personnels extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'fonction',
        'telephone'
    ];
    public function formations()
    {
        return $this->belongsTo(Formations::class, 'id_personnels');
    }
}
