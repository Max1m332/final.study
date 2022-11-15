@extends('layouts.default')

@section('title-block')Каталог@endsection

@section('content')
<h1>Каталог</h1>

<table>
  <tr>
    <th>id</th>
    <th>Название товара</th>
    <th>цена товара</th>
    <th>оставшееся количество</th>
  </tr>
  @foreach ($all_products as $item)
  <tr>
    <td>{{$item->id}}</td>
    <td>{{$item->name}}</td>
    <td>{{$item->price}}</td>
    <td>{{$item->quantity}}</td>
  </tr>
  @endforeach
  

</table>



@endsection