<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">

        </div>
        <img src="{{Storage::url($product->image)}}" alt="iPhone X 64GB">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}} руб.</p>
            @isset($product->category)
                <h3>{{$product->category->name}}</h3>
                <p>{{$product->category->code}}</p>
            @endisset
            <p>
            <form action="{{route('basket-add',$product)}}" method="POST">
                <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                <a href="{{route('product',[$product->category->code,$product->code])}}"
                   class="btn btn-default"
                   role="button">Подробнее</a>
                <input type="hidden" name="_token" value="WttEdroQWDkPWgS7dk3KjUwovEU7aoIP3konNeHm">
                @csrf
            </form>
            </p>
        </div>
    </div>
</div>
