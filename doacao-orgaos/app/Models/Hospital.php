<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city', 'state'];

    // Relacionamento com usuários
    public function users()
    {
        return $this->belongsToMany(User::class, 'hospital_user');
    }
}
