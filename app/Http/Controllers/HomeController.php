<?php

namespace App\Http\Controllers;

use App\Film;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $film = Film::all();
        $favorites = User::find(Auth::user()->id)->get(['favorite'])->toArray();
        $favorites = explode(',',$favorites[0]['favorite']); //array
        return view('/home',compact('favorites','film'));
    }
}
