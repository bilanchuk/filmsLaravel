<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Фільми</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .film-container{
                width: 100%;
                height: 100vh;
                display: flex;
                justify-content: space-around;
                align-items: center;
            }
            .arrows{
                position: fixed;
                bottom: 10px;
                width: 100%;
                display: flex;
                justify-content: center;
            }
            .item-container{
                flex-basis:27%;
                display: flex;
                height: 70vh;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .item-container div{
                margin-bottom: 2%;
            }
            .film-image{
                height: 30vh;
            }
            .film-image img{
                height: 100%;
                width: 100%;
                object-fit: contain;
            }
            .film-title{
                font-size: 30px;
                text-align: center;
            }
            .film-subtitle{
                text-align: center;
                color: slategrey;
                font-style: italic;
            }
            .film-content{
                text-align: justify;
                background: rgba(0, 0, 0, 0.1);
                padding: 5px;
            }
            .category-menu{
                position: fixed;
                top: 10px;
                left: 10px;
                display: flex;
                justify-content: space-around;
            }
            .category-menu div {
                border-right: 1px solid cornflowerblue;
                text-align: center;
                padding-right: 10%;
                padding-left: 5%;
            }
            .category-menu div:last-child{
                border: none;
            }
            .category-menu div a{
                text-decoration: none;
                color: black;
            }
            .category-menu div a:hover{
                color: blue;
            }
            .film-link a{
                color: black;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Улюблені фільми</a>
                    @else
                        <a href="{{ route('login') }}">Увійти</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Реєстрація</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div class="category-menu">
            @foreach ($category as $item)
                <div><a href="/category/{{$item->category}}">{{$item->category}}</a></div>
            @endforeach
        </div>


        <div class="film-container">
            @foreach ($films as $item)
                <div class="item-container">
                    <div class="film-title">{{$item->title}}</div>
                    <div class="film-subtitle">{{$item->subtitle}}</div>
                    <div class="film-content">{{$item->content}}</div>
                    <div class="film-image"><img src="{{url('storage/'.$item->imgsrc)}}" alt=""></div>
                    <div class="film-link alert alert-info"><a href="/film/{{$item->id}}">Перейти до фільму</a></div>
                </div>
            @endforeach
        </div>
        <div class="arrows">{{$films->links()}}</div>
    </body>
</html>
