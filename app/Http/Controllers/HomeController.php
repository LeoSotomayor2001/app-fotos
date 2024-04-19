<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index()
    {
        if (Auth::check()) {
            $followingUsers = auth()->user()->followings->pluck('id')->toArray();
            $publicaciones = Publicacion::whereIn('user_id', $followingUsers)->orderBy('created_at', 'desc')->paginate(10);
            $user = auth()->user();
        } else {
            $publicaciones = [];
            $user = null;
        }
        
        return view('principal', compact('publicaciones', 'user'));
    }
}
