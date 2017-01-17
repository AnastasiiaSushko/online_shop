@extends('layouts.master')


@section('content')

    <div class="thumbnail" style="clear: both; padding-left: 40px">
        <div class="caption">
        <h1 style="text-align: center"><a href="/category/{{$category->id}}">{{$category->title}}</a> </h1>
     </div>
        <div class="row">

            @foreach($categories as $category2)
                @if($category2->parent_id==$category->id && $category->title!='Акция')
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <a href="/category/{{$category2->id}}"><img src="{{$category2->main_photo}}"></a>
                            <div class="caption">
                                <h3 style="text-align: center">{{$category2->title}}</h3>
                                 </div>
                        </div>
                    </div>
                @endif

            @endforeach


        @foreach($products as $product)

                <div class="col-xs-6 col-lg-4">
                    <h3 style="text-align: center">{{$product->title}}</h3>
                    <p><img src="{{$product->main_photo}}" style="height: 250px" ></p>
                    <p>{{$product['description']}} </p>

                    @if($product['sale']==true)
                        <p><s>{{$product['price']}} грн.</s> <span style="color: red">{{$product['new_price']}} грн. </span></p>
                    @else
                        <p>{{$product->price}} грн.</p>
                    @endif
                    <p><a class="btn btn-default" href="/product/{{ $product->id}}" role="button">View details &raquo;</a></p>
                </div><!--/.col-xs-6.col-lg-4-->
            @endforeach
        </div>


    {{$products->links()}}

    </div>

@endsection
