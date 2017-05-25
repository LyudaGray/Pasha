<div class="clearfix"></div>
<div id="inner-wrapper">
    <!--- Start Animation -->
    <section class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">
        <h3 class="text-welcome">Оставьте свой отзыв</h3>
        <div class="line-rule"></div>
    </section> <!--- End Animation -->
<!-- Start Contact Form -->
    <section class="two-third" class="contact">
    <!--- Start Animation -->
        <section class="os-animation" data-os-animation="fadeInUp" data-os-animation-delay="0s">

        <div id="contact-area">

            <div id="contact" class="section">

                <div class="container content">

                    <div id="contact-form">


                        <form id="contact-us" action="{{route('contactUs')}}" method="post">
                            <div class="formblock">
                                <label class="screen-reader-text">ФИО</label>

                                <input type="text" name="name" id="contactName" value="" class="txt requiredField" placeholder="ФИО:" />

                            </div>
                            <div class="clearfix"></div>
                            <div class="formblock">
                                <label class="screen-reader-text">Email</label>

                                <br />

                                <input type="text" name="email" id="email" value="" class="txt requiredField email" placeholder="Email:" />

                            </div>

                            <div class="clearfix"></div>
                            <div class="formblock">
                                <label class="screen-reader-text">Сообщение</label>

                                <textarea name="comment" id="commentsText" class="txtarea requiredField" placeholder="Сообщение:"></textarea>

                            </div>
                            <div class="clearfix"></div>
                            <button name="submit" type="submit" class="subbutton">Отправить</button>
                            <input type="hidden" name="submitted" id="submitted" value="true" />

                            {{ csrf_field() }}

                        </form>


                    </div>

                </div>

            </div>
        </div>

    </section> <!--- End Animation -->
    </section>

    </section>
<!-- End Contact Form -->
</div>