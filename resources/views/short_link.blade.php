@extends('layout.layout')

@section('content')
    <main class="form-signin">
        <div>
            <h1 class="h3 mb-3 fw-normal">Ваша ссылка</h1>

            <a href='{{$shortLink->link}}' target="_blank">{{request()->server('HTTP_ORIGIN').'/'.$shortLink->shortcode}}</a>
        </div>

        <div><a href='/'>На главную</a></div>
    </main>

@endsection
