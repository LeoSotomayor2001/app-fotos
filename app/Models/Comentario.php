<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Comentario extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['comentario','user_id','publicacion_id']; // Especifica qué campos pueden ser asignados masivamente

    public function user()
    {
        return $this->belongsTo(User::class); // Relación de pertenencia a un usuario
    }

    public function publicacion()
    {
        return $this->belongsTo(Publicacion::class); // Relación de pertenencia a una publicación
    }


}
