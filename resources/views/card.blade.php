<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">

        </div>
        <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}} руб.</p>
            @isset($category)
                <h3>{{$category->name}}</h3>
                <p>{{$category->price}}</p>
            @endisset
            <p>
            <form action="{{route('basket')}}" method="POST">
                <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                <a href="http://internet-shop.tmweb.ru/mobiles/iphone_x_64"
                   class="btn btn-default"
                   role="button">Подробнее</a>
                <input type="hidden" name="_token" value="WttEdroQWDkPWgS7dk3KjUwovEU7aoIP3konNeHm"></form>
            </p>
        </div>
    </div>
</div>
