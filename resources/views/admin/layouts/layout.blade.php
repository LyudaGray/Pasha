<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="{{asset('css/admin/style.css')}}" rel="stylesheet">

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
                <li><a href="{{route('admin-add-cat')}}" >ДОБАВИТЬ КАТЕГОРИЮ</a></li>
                <li><a href="{{route('admin-add-product')}}" >ДОБАВИТЬ ТОВАР</a></li>
                <li><a href="{{route('admin-show-products')}}" >ПРОСМОТРЕТЬ ИМЕЮЩИЕСЯ ТОВАРЫ</a></li>
                <li><a href="{{asset('/admin/orders/0')}}" >ПРОСМОТРЕТЬ ТЕКУЩИЕ ЗАКАЗЫ</a></li>
                <li><a href="{{asset('/admin/orders/1')}}" >ПРОСМОТРЕТЬ ЗАКРЫТЫЕ ЗАКАЗЫ</a></li>
            </ul>


        </aside><!-- .left-sidebar -->

    </div><!-- .middle-->

</div><!-- .wrapper -->

<footer class="footer">


    <strong>Footer:</strong>FOOTER
</footer><!-- .footer -->

<div id="product-modal" class="modal modal_sm">
    <div class="modal__container">
        <a href="javascript:void(0);" class="modal__close js-modal-close">X</a>
        <div class="modal__body">
            <h4> Заказать звонок</h4>
            <form class="form form_horizontal">
                <div class="form__row">
                    <input id="test" type="text" name="userName" value="" placeholder="Ваше Имя" required class="ui-input"><span class="error"></span>
                </div>
                <div class="form__row">
                    <input type="tel" name="userPhone" value="" placeholder="Ваш телефон" required class="ui-input"><span class="error"></span>
                </div>
                <div class="form__row">
                    <input type="submit" name="submit" onclick="changeData();" value="Заказать обратный звонок" class="button button_md button_primary button_brand">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src={{asset('js/admin/modal.js')}}></script>
<script src={{asset('js/admin/admin.js')}}></script>
</body>
</html>