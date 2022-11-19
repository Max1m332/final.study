@extends('layouts.default')

@section('title-block')Каталог@endsection

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Редактирование</h1>
 
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="POST" action="/catalog/update" >
            @csrf
            <div class="form-group">
 
                <label for="title">Название товара</label>
                <input type="text" class="form-control" name="title" value="{{ $item->title }}" />
            </div>
 
            <div class="form-group">
                <label for="price">Цена товара</label>
                <input type="text" class="form-control" name="price" value="{{ $item->price }}" />
            </div>
 
            <div class="form-group">
                <label for="quantity">Количество товара</label>
                <input type="text" class="form-control" name="quantity" value="{{ $item->quantity }}" />
            </div class="col-md-12">
            <input type="hidden" name="id" value="{{ $item->id }}">
            <button type="submit" value="Save" class="btn btn-primary">Обновить</button>
        </form>
    </div>
</div>

@endsection