@extends('layouts.master')

@section('title',__('main.product'))

@section('content')
    <h1>{{$skus->product->__('name')}}</h1>
    <h2>{{$skus->product->category->name}}</h2>
    <p>@lang('product.price'): <b>{{$skus->price}} {{$currencySymbol}}</b></p>
    <img src="{{Storage::url($skus->product->image)}}">
    <p>{{$skus->product->__('description')}}</p>


    @if($skus->isAvailable())
        <form action="{{ route('basket-add', $skus->product) }}" method="POST">
            <button type="submit" class="btn btn-success" role="button">@lang('product.add_to_cart')</button>
            @csrf
        </form>
    @else
        <span>@lang('product.not_available')</span>
        <br>
        <span>@lang('product.tell_me'):</span>
        <div class="warning">
            @if($errors->get('email'))
                {!! $errors->get('email')[0] !!}
            @endif
        </div>
        <form method="POST" action="{{ route('subscription', $sku) }}">
            @csrf
            <input type="email" name="email">
            <button type="submit">@lang('product.subscribe')</button>
        </form>
    @endif

@endsection
