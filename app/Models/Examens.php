<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examens extends Model
{
    use HasFactory;
    protected $fillable = [
        'datedebut',
        'datefin',
        'lieu',
        'heure',
        'type'
    ];
    public function examens()
    {
        return $this->hasMany(Examens::class);
    }
}
