<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="{{asset('css/admin/style.css')}}" rel="stylesheet">
    <script src={{asset('js/admin/admin.js')}}></script>
</head>

<body>

<div class="wrapper">

    <header class="header">
        <strong>Header:</strong> <a href="{{route('main_page')}}">HEADER</a>

        <div class="info-success">
            @include('flash::message')
        </div>


    </header><!-- .header-->

    <div class="middle">

        <div class="container">
            <main class="content">
                                 @yield('content')
            </main><!-- .content -->
        </div><!-- .container-->

        <aside class="left-sidebar">



            <ul>
                <li><a href="{{route('admin-add-cat')}}" >ДОБАВИТЬ КАТЕГОРИЮ</a> </li>
                <li><a href="{{route('admin-add-product')}}" >ДОБАВИТЬ ТОВАР</a> </li>
                <li><a href="{{asset('/admin/orders/0')}}" >ПРОСМОТРЕТЬ ТЕКУЩИЕ ЗАКАЗЫ</a> </li>
                <li><a href="{{asset('/admin/orders/1')}}" >ПРОСМОТРЕТЬ ЗАКРЫТЫЕ ЗАКАЗЫ</a> </li>
            </ul>


        </aside><!-- .left-sidebar -->

    </div><!-- .middle-->

</div><!-- .wrapper -->

<footer class="footer">
    <strong>Footer:</strong>FOOTER
</footer><!-- .footer -->

</body>
</html>