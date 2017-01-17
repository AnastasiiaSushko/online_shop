@extends('layouts.master')

@section('content')

    <div class="col-xs-12 col-sm-9">
    @foreach($categories as $category)
        @if($category->parent_id==0)
                <div style="border: 2px solid black; clear: both; background:#122b40;" >
                    <h1 style="text-align: center"><a href="/category/{{$category->id}}" style="color: white">{{$category->title}}</a> </h1><br>
                </div>
                    @else
            <h2><a href="/category/{{$category->id}}">{{$category->title}}</a></h2><br>
            <div class="row">
            @foreach($category->all_products() as $product)

                @if($product['sale']==0)
                    <div class="col-xs-6 col-lg-4">
                        <h3 style="text-align: center">{{$product['title']}}</h3>
                        <p><img src="{{$product['main_photo']}}" style="height: 250px" ></p>
                        <p>{{$product['description']}} </p>
                        <p>{{$product['price']}} грн.</p>
                        <p><a class="btn btn-default" href="/product/{{ $product['id']}}" role="button">View details &raquo;</a></p>
                    </div><!--/.col-xs-6.col-lg-4-->

                    @else
                        <div class="col-xs-6 col-lg-4">
                            <h3 style="text-align: center">{{$product['title']}}</h3>
                            <p><img src="{{$product['main_photo']}}" style="height: 250px" ></p>
                            <p>{{$product['description']}} </p>
                            <p><s>{{$product['price']}} грн.</s> <span style="color: red">{{$product['new_price']}} грн. </span></p>
                            <p><a class="btn btn-default" href="/product/{{ $product['id']}}" role="button">View details &raquo;</a></p>
                        </div><!--/.col-xs-6.col-lg-4-->

                    @endif
                @endforeach
            </div>
            @endif
            @endforeach
</div>





<!-- Carousel-->


<div class="col-xs-6 col-sm-3 sidebar-offcanvas">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 500px; width: 350px">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox" style="height: 500px">

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


<!-- /.carousel  <div class="col-md-6"></div> -->

@endsection



















