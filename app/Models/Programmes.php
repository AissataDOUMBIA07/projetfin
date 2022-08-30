<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ProgrammesController;


class Programmes extends Model
{
    use HasFactory;
    protected $fillable = [
        'programme',
        'datedebut',
        'datefin',
        'heure',
        'id_personnels'
    ];
    public function programmes()
    {
        return $this->hasMany(Programmes::class);
    }
}
