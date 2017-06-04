<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee-Shop</title>
    <link href={{asset("css/jquery.bxslider.css")}} rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href={{asset("css/style.css")}}/>
    <link rel="stylesheet" type="text/css" href={{asset("css/template.css")}}/>

    <link rel="stylesheet" href={{asset("css/font-awesome.min.css")}}>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href={{asset("css/animate.css")}}/>
    <link rel="stylesheet" type="text/css" href={{asset("css/waypoints.css")}}/>

    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/png" href={{asset('img/zn.png')}}/>

    <meta name="description" content="">
    <script src="{{asset('js/modernizr.js')}}"></script>


</head>
<body>
<!--- start wrapper -->
<div class="wrapper">
<header>
    <div id="header-inner">
        <a href="/" id="logo" title=""></a>
        <nav>
            <a href="#" id="menu-icon"></a>
              @if($menus)
                <ul>
                    @foreach($menus as $menu)
                        <li><a href="{{$menu['url']}}" class="current">{{$menu['title']}}</a></li>
                    @endforeach

                        <li class="basketball"><a id="cart" href="{{route('cart')}}" title=""><i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <span class="count">
                                {{(count(session()->get('cart')) == 0) ? "" : count(session()->get('cart'))}}
                            </span>
                            </a>
                        </li>
                </ul>
            @endif
        </nav>
    </div>

</header>

    <!--- Start Slider -->
          @yield('slider')
    <!--- End Slider -->


<div class="clearfix"></div>
<!--- Start Animation -->
<!--<section class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">-->


    <!--- Start Categories -->
        @yield('categories')
    <!--- End Categories -->


    <!--- Start Categories -->
         @yield('categories_grafica')
    <!--- End Categories -->



<div class="clearfix"></div>
</div><!--- end wrapper -->
<!--- Start Footer -->
<footer class="footer">
    <div id="footer-inner">
        <section class="one-third" id="footer-third">
            <h3>Контакты</h3>
            <p class="footercontact">Coffee-Shop<br>
                <b class="phone">+38(050)395-05-28</b><br>
                <b class="phone">+38(098)321-82-61</b><br>
                <b ><a href="#">coffeeshopzh@gmail.com</a></b><br>
                Одесса<br></p>
        </section>
        <section class="one-third" id="footer-third">
            <h3>Мы в соцсетях</h3>
            <br>
            <ul class="social">
                <li><a href="https://www.facebook.com/coffee_shop" target="_blank"title=""><i class="fa fa-facebook" id="facebook"></i></a></li>
                <li><a href="https://plus.google.com/coffee_shop " target="_blank"title=""><i class="fa fa-google-plus" id="google-plus"></i></a></li>
                <li><a href="https://twitter.com/coffee_shop" target="_blank"title=""><i class="fa fa-twitter" id="twitter"></i></a></li>
                <li><a href="https://youtube.com/user/coffee_shop" target="_blank"title=""><i class="fa fa-youtube" id="youtube"></i></a></li>
            </ul>
        </section>
        <section class="one-third" id="footer-third-last">
            <h3>Страницы</h3>
            <br>
            <h5><a href="{{route('main_page')}}">Главная</a> - <a href="{{route('about_page')}}">о нас</a> - <a href="{{route('facility')}}">оплата и доставка</a> - <a href="{{route('contacts')}}">контакты</a></h5>
        </section>
    </div>
    <div class="footer second">
        <p>&copy; Coffee-Shop, 2017.</p>
    </div>
</footer>

<!--- End Footer -->
<!--- Top Scroll Start -->
<a href="#0" class="cd-top">наверх</a>
<script src={{asset('js/jquery-1.11.2.min.js')}}></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src={{asset('js/jquery.waypoints.min.js')}}></script>
<script src={{asset('js/jquery.bxslider.min.js')}}></script><!--For Image Slider-->
<script src={{asset('js/waypoints.js')}}></script>
<script src={{asset('js/main.js')}}></script>
<script src="{{asset('js/top.js')}}"></script> <!-- Gem jQuery -->

<!--- Top Scroll End -->
</body>
</html>
