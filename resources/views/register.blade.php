@extends('layouts.default')

@section('title-block')Регистрация@endsection

@section('content')
        <h1> Авторизация </h1>
        <h4>Введите свои данные</h4>
        
        
        
        <div class="container">
        <form action="{{ route('register-form')}}" method="post">
            <div class="form-group">
                @csrf
                <label for="email">Введите Почту</label>
                <input type="text" name="email" placeholder="Почта" id="email" class="form-control"><br>
                <label for="password">Введите Пароль</label>
                <input type="password" name="password" placeholder="Пароль" id="password" class="form-control"><br>       
                <button type="submit" class="btn btn-success">Отправить</button>
            </div>
        </form>
    @endsection