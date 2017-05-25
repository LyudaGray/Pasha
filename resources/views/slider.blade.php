<script src="js/jquery.bxslider.min.js"></script><!--For Image Slider-->
<div class="slide-wrap">

    <section class="slider">
        <ul class="slider1">
            <li><img src="img/Optimized-sl1.jpg" title="" /></li>
            <li><img src="img/Optimized-sl22.jpg" title="" /></li>
            <li><img src="img/Optimized-sl3.jpg" title="" /></li>
            <li><img src="img/Optimized-sl4.jpg" title="" /></li>
            <li><img src="img/Optimized-sl5.jpg" title="" /></li>
        </ul>

    </section>
    <img src="img/kofe.png" class="kofe">

    </section> <!--- End Animation -->
</div>

<script type="text/javascript">
    $('.slider1').bxSlider({
        mode: 'fade',
        captions: false,
        auto:true,
        pager:false,

    });
    $('.slider2').bxSlider({
        pager:false,
        captions: true,
        maxSlides: 3,
        minSlides: 1,
        slideWidth: 230,
        slideMargin: 10
    });
    $('.slider3').bxSlider({
        mode: 'fade',
        captions: false,
        auto:true,
        pager:false,
        controls:false,
    });
</script>