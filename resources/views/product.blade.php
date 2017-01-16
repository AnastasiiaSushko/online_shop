@extends('layouts.master')

@section('content')

<div style="clear: both">

<h2>{{$product->title}}</h2> <br>

<img src=" {{$product->main_photo}}" style="height: 450px"> <br>

@if(Auth::user())
    <hr>
    <h3>Оставить комментарий..</h3>
    <form method="post" action="/product/{{ $product->id }}">
        {{csrf_field()}}

        <textarea name="comment" rows="8"  cols="50"></textarea></br>
        <button type="submit" class="btn btn-info">Оставить комментарий</button>
    </form>
    <hr>
@else
    <h3>Чтобы оставить комментарий необходимо залогиниться..</h3>
    @endif

@foreach($comments as $comment)
{{$comment->comment}}
    @endforeach

</div>
@endsection


