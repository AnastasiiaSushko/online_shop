@extends('layouts.master')

@section('content')

<div style="clear: both">

<h2>{{$product->title}}</h2> <br>

    <p><a href="/cart/{{$product['id'] }}" class="btn btn-default" role="button">Купить</a>
</div>


<div class="container marketing">
        <!-- Three columns of text below the carousel -->
        <div class="row">

            @for($i=0;$i<3;$i++)
            <div class="col-lg-4">
                <img class="img-circle"
                     src="{{$product->main_photo}}"
                     alt="" width="250" >
            </div><!-- /.col-lg-4 -->
   @endfor
        </div><!-- /.row -->


 <!--MAIN CONTENT-->

       {!! $product->content !!}

<!--/main content-->





@if(Auth::user())
    <hr>
    <h3>Оставить комментарий..</h3>
    <form method="post" action="/product/{{ $product->id }}">
        {{csrf_field()}}

        <textarea name="comment" rows="8"  cols="70"></textarea></br>
        <div class="checkbox">
            <input name="recommend" type="radio" value="recommend"> Рекоммендую!
            <input name="recommend" type="radio" value="not_recommend"> Не рекоммендую
        </div>
        <button type="submit" class="btn btn-info">Оставить комментарий</button>
    </form>
    <hr>
@else
    <h3>Чтобы оставить комментарий необходимо залогиниться..</h3>
    @endif




    @foreach($comments as $comment)
    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object img-circle" src="https://image.freepik.com/free-icon/male-user-shadow_318-34042.jpg" style="height: 30px">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">{{ $comment->user->name }}</h4>
            {{ $comment->comment }}

           <!--Recommend-->
            @if($comment->recommend==1)
            <button type="button" class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
            </button>
            @endif
            <!--/recommend-->

            <!--Not_Recommend-->
            @if($comment->not_recommend==1)
                <button type="button" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                </button>
        @endif
        <!--/not_recommend-->



            <div class="text-right">
                <span class="text-success" id="likes{{ $comment->id }}">{{ $comment->likes}}</span>
                <div class="btn-group btn-group-xs" role="group" aria-label="...">
                    <button class="btn btn-success" onclick="return plusMinus('plus', {{ $comment->id }})">+</button>
                    <button class="btn btn-danger" onclick="return plusMinus('minus', {{ $comment->id }})">-</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <hr>




</div>
@endsection


