@extends('layouts.master')

@section('content')



    <!-- Carousel-->


    <div class="col-md-6">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">

                @foreach ($sliders as $key=>$slider)

                    @if($key==0)

                        <div class="item active">
                            <img class="first-slide" src="{{$slider->main_photo}}" alt="First slide">
                            <div class="container">
                                <div class="carousel-caption">
                                    <p style="background-color: #1f648b">{{$slider->description}}</p>

                                </div>
                            </div>
                        </div>


                    @elseif($key == 1)
                        <div class="item">
                            <img class="second-slide" src="{{$slider->main_photo}}" alt="Second slide">
                            <div class="container">
                                <div class="carousel-caption">
                                    <p style="background-color: #1f648b">{{$slider->description}}</p>
                                </div>
                            </div>
                        </div>



                    @else
                        <div class="item">

                            <img class="third-slide" src="{{$slider->main_photo}}" alt="Third slide">
                            <div class="container">
                                <div class="carousel-caption">
                                    <p style="background-color: #1f648b">{{$slider->description}}</p>
                                </div>



                            </div>
                        </div>
            </div>


            @endif
            @endforeach

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>

    </div>

    <div class="col-md-4"></div>
    <!-- /.carousel -->










<div style="clear: both">


    @foreach($categories as $category)
        @if($category->parent_id==0)

                    <h1 style="color:seagreen; text-align: center">{{$category->title}} </h1><br>

                    @else
            <h2>{{$category->title}}</h2><br>
            <div class="row">
            @foreach($category->all_products() as $product)

                @if($product['sale']==0)
                    <div class="col-xs-6 col-lg-4">
                        <h3>{{$product['title']}}</h3>
                        <p><img src="{{$product['main_photo']}}" style="height: 250px" ></p>
                        <p>{{$product['description']}} </p>
                        <p>{{$product['price']}} грн.</p>
                        <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                    </div><!--/.col-xs-6.col-lg-4-->

                    @else
                        <div class="col-xs-6 col-lg-4">
                            <h3>{{$product['title']}}</h3>
                            <p><img src="{{$product['main_photo']}}" style="height: 250px" ></p>
                            <p>{{$product['description']}} </p>
                            <p><s style="color: red">{{$product['price']}}</s> {{$product['new_price']}} грн.</p>
                            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                        </div><!--/.col-xs-6.col-lg-4-->


                    @endif



                @endforeach
            </div>
            @endif
            @endforeach






</div>



</div> <!--<div class="col-xs-12 col-sm-9">-->

@endsection



















