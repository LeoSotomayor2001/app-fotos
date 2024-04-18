<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;
    protected $table='publicaciones';

    protected $fillable=[
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    
   
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
    public function user()
    {

        return $this->belongsTo(User::class) // Establece la relación "belongsTo" con el modelo User
        ->select(['name', 'username','id']); // Selecciona solo las columnas 'name' , id y 'username' de la tabla User
    
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'publicacion_id', 'user_id');
    }
    

}
