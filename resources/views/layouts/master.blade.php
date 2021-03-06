<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Online_shop</title>

    <!--List menu-->
    <link rel="stylesheet" href="/css/style1.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link rel="stylesheet" href="http://getbootstrap.com/examples/carousel/carousel.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>


    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/offcanvas/offcanvas.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="http://getbootstrap.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">


</head>
<body style="background-color: @if($background_color){{$background_color->value}}@else white @endif">
<nav class="navbar navbar-inverse navbar-fixed-top">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a tabindex="-1" class="navbar-brand" href="/main">ONLINE_SHOP</a>

    </div>
    <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">

            @foreach($menu as $category)
                @if($category->title=='Акция')
                    <li><a href="/category/{{$category->id}}" style="color: red">{{$category->title}}</a></li>
                @endif
            @endforeach
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-haspopup="true" aria-expanded="false">Категории <span class="caret"></span></a>
                <ul class="dropdown-menu">

                    @foreach($menu as $category)

                        @if($category->parent_id==0)

                            <li class="menu-item dropdown dropdown-submenu"><a tabindex="-1"

                                                                               href="/category/{{$category->id}}">{{$category->title}}</a>
                                <ul class="dropdown-menu">
                                    @foreach($menu as $category2)

                                        @if($category->id==$category2->parent_id)

                                            <li class="menu-item "><a
                                                        href="/category/{{$category2->id}}"> {{$category2->title}}</a>
                                            </li>

                                        @endif

                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>

            @if (($user = Auth::user()) && $user->moderator)
                <li><a href="/admin" style="color:blue">Admin panel</a></li>
            @endif

            @if (($user = Auth::user()))
                <li><a href="/user/{{$user->id}}">Личный кабинет</a></li>
            @endif
            <li><a href="/cart"><img
                            src="http://www.inmotionhosting.com/support/images/stories/icons/ecommerce/empty-cart-light.png"
                            style="height: 30px"></a></li>
        </ul>


        <form action="/search" class="navbar-form navbar-left">
            <div class="input-group">
                <input type="text" class="form-control" name="q" placeholder="Искать...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><span
                                                    class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                        </button>
                                    </span>
            </div><!-- /input-group -->
        </form>


        <ul class="nav navbar-nav navbar-right" style="margin-right: 40px">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Войти</a></li>
                <li><a href="{{ url('/register') }}">Регистрация</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Выйти
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>

    </div>

</nav>

<!--/.nav-collapse -->

<div class="container">

    <div class="row row-offcanvas row-offcanvas-right">
        <div class="col-xs-12 col-sm-9">


            <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
            </p>
            <div class="jumbotron" style="background: black; text-align: center">
                <img src="/img/logo.png">
            </div>

        </div>


        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
            <div class="list-group">
                <a href="#" class="list-group-item active">ТОП 5 ТОВАРА</a>
                @foreach($top as $top1)
                    <a href="/product/{{$top1->id}}" class="list-group-item">{{$top1->title}} <img
                                src="{{$top1->main_photo}}" style="height: 60px;"></a>
                @endforeach
            </div>
        </div><!--/.sidebar-offcanvas-->

        @yield('content')


        <div class="col-xs-6 col-sm-3 sidebar-offcanvas">

        </div><!--/.sidebar-offcanvas-->


    </div><!--/row-->


    <hr>

    <footer>
        <p>&copy; 2016 Company, Inc.</p>
    </footer>

</div><!--/.container-->


<!-- Modal subscribe -->

<div id="parent_popup">
    <div id="popup">
    <span style="font:24px Monotype Corsiva, Arial;
	      color: #008000;
	      text-align: left;
	      text-shadow: 0 1px 3px rgba(0,0,0,.3);">Оформить подписку...</span><br><br/>
        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="Your name"><br><br>
            <input type="text" name="email" id="email" placeholder="Your email"><br><br>
        </form>
        <p style="text-align: center; font-size:18px;"><strong><a href="#">Подписаться »</a></strong></p>
        <a class="close" title="Закрыть" onclick="document.getElementById('parent_popup').style.display='none';">X</a>
    </div>
</div>


<script>

    window.onbeforeunload = function () {
        return confirm('Покинуть страницу?')
    };
    var delay_popup = 15000;
    setTimeout("document.getElementById('parent_popup').style.display='block'", delay_popup);

</script>


<script src="/js/functions.js"></script>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="http://getbootstrap.com/assets/js/vendor/holder.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>

