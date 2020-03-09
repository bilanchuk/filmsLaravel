@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Підтвердіть свою електронну адресу</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Нова силка підтвердження була відправлена вам на електронну адресу
                        </div>
                    @endif
                    Перевірте свою електронну адресу на ссилку з підтвердженням.
                    Якщо ви не отримали письма
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Натисніть сюди щоб отримати нову силку</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
