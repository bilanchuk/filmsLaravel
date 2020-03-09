@extends('layouts.app')
<header>
    <style>
        .user-info{
            height: 100vh;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 25px;
            padding-left: 1%;
        }
        .user-info-container{
            margin-bottom: 3%;
            width: 100%;
            display: flex;
            justify-content: flex-start;
        }
        .titels{
            align-self: flex-end;
            font-weight: bolder;
        }
        .user-info-container div{
            align-self: flex-end;
            margin-right: 2%;
        }
        .form-wrapper{
            position: relative;
            top: 40%;
        }
        input[type="text"]{
            width: 230px;
            height: 40px;
        }
        .errors{
            width: 100%;
            display: flex;
            justify-content: center;
        }
    </style>
</header>

<div class="user-info">
    <div class="user-info-container">
        <div class="titels">Імя :</div> 
        @if(isset($change) && $change == 0)
                <div class="form-wrapper">
                    <form action="/changename" method="post">
                        @csrf
                        <input type="text" name="name" value="{{ old('name') }}">
                        <button type="submit" class="btn btn-success">Змінити</button>
                    </form>
                </div>
            @else
                <div>{{Auth::user()->name ?? 'Імя не задано'}}</div>
                <div>
                    <a href="/infoname">Змінити імя</a>
                </div>
        @endif
    </div>
    <div class="user-info-container"><div class="titels">Електронна адреса :</div> 
        @if(isset($change) && $change == 1)
            <div class="form-wrapper">
                <form action="/changemail" method="post">
                    @csrf
                    <input type="text" name="email" value="{{ old('email') }}">
                    <button type="submit" class="btn btn-success">Змінити</button>
                </form>
            </div>
        @else
            <div>{{Auth::user()->email ?? 'Електронна адреса не задана'}}</div>
            <div><a href="/infomail" title="Потрібно буде підтвердити електронну адресу">Змінити пошту</a></div>
        @endif
    </div>
    <div class="user-info-container"><div class="titels">Телефон :</div>
        @if(isset($change) && $change == 2)
            <div class="form-wrapper">
                <form action="/changetel" method="post">
                    @csrf
                    <input type="text" name="tel" value="{{ old('tel') }}">
                    <button type="submit" class="btn btn-success">Змінити</button>
                </form>
            </div>
        @else 
            <div>{{Auth::user()->tel ?? 'Номер телефону не заданий'}}</div>
            <div><a href="/infotel">Змінити телефон</a></div>
        @endif
    </div>
    <div class="user-info-container"><div class="titels">Дата народження :</div>
        @if(isset($change) && $change == 3)
            <div class="form-wrapper">
                <form action="/changedate" method="post">
                    @csrf
                    <input type="date" name="date" value="{{ old('dateOfBirth') }}">
                    <button type="submit" class="btn btn-success">Змінити</button>
                </form>
            </div>
        @else  
            <div>{{Auth::user()->dateOfBirth ?? 'Дата народження не задана'}}</div>
            <div><a href="/infodate">Змінити дату народження</a></div>
        @endif
    </div>
    <div class="user-info-container">
        <form action="/password/reset" method="get">
            @csrf
            <button type="submit" class="btn btn-danger">Змінити пароль</button>
        </form>
    </div>
    <div class="user-info-container">
        
    </div>



    <?php
        if(isset($name)){ 
            dd($name);
        }
    ?>
    <div class="errors">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>