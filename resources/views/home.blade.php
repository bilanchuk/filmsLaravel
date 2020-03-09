@extends('layouts.app')


<header>
    <style>
        .film-container{
            margin-top: 8%;
            height: auto;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
        }
        .item-container{
            flex-basis: 30%;
        }
        .film-image{
            height: 300px;
            width: 100%;
        }
        .film-image img{
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .section-title{
            position: absolute;
            font-size: 20px;
            top: 8%;
            left: 40%;
        }
        .film-title{
                font-size: 30px;
                text-align: center;
            }
        .film-delete{
            text-align: center;
        }
    </style>
</header>

@if (count($favorites)>1)
    <div class="section-title">Улюблені фільми</div>
    <div class="film-container">
        @for ($i=1; $i<count($favorites); $i++)
            <div class="item-container">
                <div class="film-title">{{$film[$favorites[$i]-1]->title}}</div>
                <div class="film-image"><img src="{{url('storage/'.$film[$favorites[$i]-1]->imgsrc)}}" alt=""></div>
                <div class="film-delete"><a href="/delete/{{$i}}">Видалити з улюблених</a></div>
            </div>
        @endfor
    </div>
@else
    <h2 class="section-title">Улюблених фільмів поки нема</h2>
@endif

