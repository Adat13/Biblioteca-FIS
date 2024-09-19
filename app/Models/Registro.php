<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class Registro extends Model
{
    protected $fillable = ['nombre', 'descripcion'];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
    public function estaActivo()
    {
        return $this->estado === 'activo';
    }

}