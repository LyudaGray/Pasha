<div class="clearfix"></div>
<div class="inner-wrapper">
    <!--- Start Animation -->
    <!--<section class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">-->
    <h1 class="head-welcome">Coffee-Shop</h1>
    <div class="line-rule"></div>
    <h3 class="text-welcome">Интернет-магазин турецких джезв, темперов, посуды, кофе и кофейных аксессуаров</h3>
    <!--</section> <!--- End Animation -->
</div>

<div class="clearfix"></div>

<div class="inner-wrapper">

    <div class="container-products">
        <ul class="products first">
            @foreach($categories as $key => $category)

                    <li>
                        <a href="/category/{{$category['id']}}">
                            <figure>
                                 <img src="img/{{$category['img']}}.jpg"> <figcaption><h5>{{$category['title']}}<br><i>&nbsp;</i> </h5></figcaption>
                            </figure></a>
                    </li>

            @endforeach
        </ul>
    </div>
</div>