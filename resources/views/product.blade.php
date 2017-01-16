@extends('layouts.master')

@section('content')



<h2>{{$product->title}}</h2> <br>

<img src=" {{$product->main_photo}}" style="height: 450px"> <br>

@if(Auth::user())
    <h3>Оставить комментарий..</h3>
    <form method="post" action="/article/{{ $new->id }}">
        {{csrf_field()}}

        <textarea name="comment" rows="8"  cols="50"></textarea></br>
        <button type="submit" class="btn btn-info">Оставить комментарий</button>
    </form>
    <hr>
@else
    <h3>Чтобы оставить комментарий необходимо залогиниться..</h3>
    @endif


</div>
@endsection


