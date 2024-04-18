<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\FollowNotification;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(User $user)
    {
        $user->followers()->attach(auth()->user()->id);

        // Envía la notificación al usuario que está siendo seguido
        $user->notify(new FollowNotification(auth()->user()));

        return back();
    }
    public function destroy(User $user)
    {
        // Desvincula al usuario autenticado del usuario que desea dejar de seguir
        $user->followers()->detach(auth()->user()->id);
    
        return back();
    }
}
