@extends('layouts.default')

@section('title-block')Добавить Товар@endsection

@section('content')

<form action="{{ route('products-form')}}" method="post">
    <div class="form-group">
        @csrf
        <label for="title">Введите название товара</label>
        <input type="text" name="title" placeholder="Название Товара" id="title" class="form-control"><br>
        <label for="password">Введите цену товара</label>
        <input type="text" name="price" placeholder="Цена товара" id="price" class="form-control"><br>
        <label for="password">Введите количество товара</label>
        <input type="text" name="quantity" placeholder="Количество товара" id="quantity" class="form-control"><br>       
        <button type="submit" class="btn btn-success">Отправить</button>
    </div>
</form>

@endsection