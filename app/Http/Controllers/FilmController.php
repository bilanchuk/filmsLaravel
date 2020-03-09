<?php

namespace App\Http\Controllers;

use App\Film;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilmController extends Controller
{
    public function show(){
        $films = Film::simplePaginate(3);
        $category = Film::distinct()->get(['category']);
        return view('welcome',compact('films','category'));
    }

    public function categoryShow($currentCategory){
        $films = Film::category($currentCategory)->simplePaginate(2);
        $category = Film::distinct()->get(['category']);
        return view('welcome',compact('films','category'));
    }
    
    public function showCurrentFilm($id){
        $film = Film::find($id);
        $favorites = User::find(Auth::user()->id);
        $list = $favorites->get(['favorite'])->toArray();
        $list = explode(',',$list[0]['favorite']);
        if(is_null($list[0])){
            $list = array(0);
        }
        return view('film.current',compact('film','list'));
    }

    public function addFavorite($id){
        $film = Film::all();
        $favorites = User::find(Auth::user()->id)->get(['favorite'])->toArray();
        array_push($favorites[0],$id);
        $list = implode(',',$favorites[0]); // string
        User::find(Auth::user()->id)->update(['favorite'=>''.$list]);
        $favorites = User::find(Auth::user()->id)->get(['favorite'])->toArray();
        $favorites = explode(',',$favorites[0]['favorite']); //array
        return view('/home',compact('favorites','film'));
    }

    public function deleteFavorite($id){
        $film = Film::all();
        $favorites = User::find(Auth::user()->id)->get(['favorite'])->toArray();
        $favorites = explode(',',$favorites[0]['favorite']);
        unset($favorites[$id]);
        $list = implode(',',$favorites);
        User::find(Auth::user()->id)->update(['favorite'=>''.$list]);
        $favorites = User::find(Auth::user()->id)->get(['favorite'])->toArray();
        $favorites = explode(',',$favorites[0]['favorite']);
        return view('/home',compact('favorites','film'));
    }
}
