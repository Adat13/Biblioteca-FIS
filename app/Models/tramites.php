<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tramites extends Model
{
    use HasFactory;
    protected $table = 'tramites';
    protected $fillable = ['titulo','autor','nombre','fecha_entrega','fecha_devolucion'];
}
