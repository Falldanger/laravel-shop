@extends('layouts.master')

@section('title','Товар')

@section('content')
    <h1>iPhone X 64GB</h1>
    <h2>{{$product}}</h2>
    <h2>Мобильные телефоны</h2>
    <p>Цена: <b>804.29 €</b></p>
    <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
    <p>Отличный продвинутый телефон с памятью на 64 gb</p>

    <form action="http://internet-shop.tmweb.ru/basket/add/1" method="POST">
        <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>

        <input type="hidden" name="_token" value="WttEdroQWDkPWgS7dk3KjUwovEU7aoIP3konNeHm"></form>
@endsection
