
<section class="intro_section page_mainslider ls">
    <div class="flexslider" data-dots="false">
        <ul class="slides">
            <?php
            foreach ($images as $img){
            ?>
            <li>
                <img src="<?=$img?>" alt="">
                <!--<div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="slide_description_wrapper">
                                <div class="slide_description">
                                    <div class="intro-layer" data-animation="fadeInLeft">
                                        <h3 class="text-uppercase">
                                            Financial
                                        </h3>
                                    </div>
                                    <div class="intro-layer" data-animation="fadeInLeft">
                                        <h2 class="text-uppercase">
                                            Planning
                                        </h2>
                                    </div>
                                    <div class="intro-layer" data-animation="fadeInLeft">
                                        <p class="small-text grey">The priority pyramid</p>
                                        <a href="about.html" class="theme_button inverse">Read more</a>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>-->

            </li>
<?php } ?>

        </ul>
    </div>
    <!-- eof flexslider -->

</section>
