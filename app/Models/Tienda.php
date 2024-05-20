<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tienda extends Model
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'nombre_legal',
        'cif',
        'telefono',
        'email',
        'url',
        'is_blocked',
        'imagenes',
        'ciudad',
        'provincia',
        'descripcion',
        'codigo_postal',
        'direccion',
    ];

    public function categorias(){
        return $this->hasMany(Categoria::class, 'id_tienda', 'id');
    }

    public function productos(){
        return $this->hasMany(Producto::class, 'id_tienda', 'id');
    }

}
