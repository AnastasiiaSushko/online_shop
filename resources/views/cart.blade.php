@extends('layouts.master')


@section('content')

    <div style="border: 2px solid black; clear: both; width: 500px; background:#122b40; color: white" >
    <h1 style="text-align: center;">Корзина...</h1> <br>
    </div>
    @if(Cart::count()>=1)

        @if(Auth::guest())

            <h2><a href="/register" style="color: darkred">Зарегистрироваться </a></h2>

            @endif

        <div>
           <h3> <a href="/clear">Очистить корзину</a> </h3>
        </div>
<br>
        <table class="table table-bordered">

            <tr>
                <th>#</th>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Удалить</th>
                <th>Купить</th>
            </tr>
            @foreach (Cart::content() as $key=>$item)
                <tr>
                    <td>{{$count++}}</td>
                    <td><a href="product/{{$item->id}}">{{$item->name}}</a></td>

                    <td>{{$item->price}}грн.</td>


                    <td><a href="/clear/{{$key}}" class="btn btn-default" role="button">Удалить</a></td>

                    <td><a href="#" class="btn btn-default" role="button">Купить</a></td>

                </tr>
            @endforeach
        </table>
    @else
        <h2>Товары еще не добавлены..</h2>
    @endif
@endsection
