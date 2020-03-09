<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        .film-container{
            display: flex;
            height: 100vh;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .film-container div{
            margin-bottom: 2%;
        }
    </style>
</head>

@isset($film)
    <div class="film-container">
        <div class="film-title display-3">{{$film->title}}</div>
        <div class="film-video">
            <iframe width="600px" height="420px" src="{{$film->videourl}}" frameborder="0" allowfullscreen></iframe>
        </div>
        @if (Auth::check())
            @if (is_null($list))
                <div class="film-favorite alert alert-info">
                    <a href="/favorite/{{$film->id}}">Додати до улюблених</a>
                </div>
            @else
                @if (!in_array($film->id,$list))
                    <div class="film-favorite alert alert-info">
                        <a href="/favorite/{{$film->id}}">Додати до улюблених</a>
                    </div>
                @endif
            @endif
            
        @endif
    </div>
@endisset
