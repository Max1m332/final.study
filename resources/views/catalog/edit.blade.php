@extends('layouts.default')

@section('title-block')Каталог@endsection

@section('content')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Editing Stock</h1>
 
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
        <form method="post" action="{{ route('', $stock->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
 
                <label for="stock_name">Название товара</label>
                <input type="text" class="form-control" name="stock_name" value="{{ $item->title }}" />
            </div>
 
            <div class="form-group">
                <label for="ticket">Цена товара</label>
                <input type="text" class="form-control" name="ticket" value="{{ $item->price }}" />
            </div>
 
            <div class="form-group">
                <label for="value">Количество товара</label>
                <input type="text" class="form-control" name="value" value="{{ $item->quantity }}" />
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
</div>

@endsection