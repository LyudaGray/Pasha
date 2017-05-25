<div class="clearfix"></div>
<!--- Start Animation -->
<section class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">
    <h3 class="text-welcome">Каталог товаров</h3>


</section> <!--- End Animation -->
<div class="clearfix"></div>
<!--- Start Animation -->
<div class="inner-wrapper">
    <section class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">
        <table>
            @foreach($categories as $key => $category)
                @if($key==0 || $key%3 ==0)
                    <tr>
                @endif
                    <td><h5><a href="/category/{{$category['id']}}">{{$category['title']}}</a></h5></td>

                    @if(($key+1)%3 ==0)
                        </tr>
                    @endif
             @endforeach
        </table>
    </section> <!--- End Animation -->
