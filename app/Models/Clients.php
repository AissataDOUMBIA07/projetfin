<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
        'userId',
        'password',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }
}
