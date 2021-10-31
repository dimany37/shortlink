@extends('layout.layout')

@section('content')
    <main class="form-signin" style="padding: 10px">
        <form action={{route('shorter')}} method='POST'>
            @csrf

            <h1 class="h3 mb-3 fw-normal">Короткая ссылка</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="Введите URL" name='link'>

            </div>git remote add origin https://github.com/dimany37/shortcode.git
            <button type="submit" class="btn btn-primary" style="margin: 10px">Укоротить</button>

        </form>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif

    </main>
@section('content')
