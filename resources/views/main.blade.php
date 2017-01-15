@extends('layouts.master')

@section('content')



    <div class="row">

            @foreach($categories as $category)
                @if($category->parent_id == 0)
                    <h1 style="text-align: center; color: rebeccapurple;">{{$category->title}} </h1><br>
                    <div class="row">
                        @foreach($category->all_products() as $product)
                        @if($product->sale==true)
                                <div class="col-xs-6 col-lg-4">
                                    <h2>{{$product->title}}</h2><br>
                                    <p><img src="{{$product->main_photo}}" style="height: 250px" ></p>
                                    <p>{{$product->description}} </p>
                                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                                    <p><s style="color: red;">{{$product->price}}</s> грн.   {{$product->new_price}} грн. </p>
                                </div><!--/.col-xs-6.col-lg-4-->

                            @else
                        <div class="col-xs-6 col-lg-4">
                            <h2>{{$product->title}}</h2><br>
                            <p><img src="{{$product->main_photo}}" style="height: 250px" ></p>
                            <p>{{$product->description}} </p>
                            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                            <p>{{$product->price}} грн. </p>
                        </div><!--/.col-xs-6.col-lg-4-->

                            @endif
                        @endforeach
                        </div>

                @endif
            @endforeach






    </div><!--/row-->
       </div><!--/.col-xs-12.col-sm-9-->





   @endsection



















