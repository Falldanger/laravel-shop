@extends('auth.layouts.master')

@isset($sku)
    @section('title', 'Редактировать Sku ' . $sku->name)
@else
    @section('title', 'Создать Sku')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($sku)
            <h1>Редактировать Sku <b>{{ $sku->name }}</b></h1>
        @else
            <h1>Добавить Sku</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($sku)
              action="{{ route('skus.update', [$product,$sku]) }}"
              @else
              action="{{ route('skus.store',$product) }}"
            @endisset
        >
            <div>
                @isset($sku)
                    @method('PUT')
                @endisset
                @csrf

                <br>
                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
