<?php

?>

<!-- Testimonials -->
<div class="slider-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="image-container">
                    <img class="img-fluid" src="<?=$model->image??'/images/testimonials-2-men-talking.svg'?>" alt="alternative">
                </div> <!-- end of image-container -->
            </div> <!-- end of col -->
            <div class="col-lg-6">
                <h2><?=$model->title?></h2>

                <!-- Card Slider -->
                <div class="slider-container">
                    <div class="swiper-container card-slider">
                        <div class="swiper-wrapper">

                            <?php
                            foreach ($model->list as $list){
                                ?>
                                <!-- Slide -->
                                <div class="swiper-slide">
                                    <div class="card">
                                        <img class="card-image" src="<?=$list->avatar??'/images/testimonial-1.svg'?>" alt="alternative">
                                        <div class="card-body">
                                            <p class="testimonial-text"><?=$list->message?></p>
                                            <p class="testimonial-author"><?=$list->name?></p>
                                        </div>
                                    </div>
                                </div> <!-- end of swiper-slide -->
                                <!-- end of slide -->

                                <?php
                            }
                            ?>

                        </div> <!-- end of swiper-wrapper -->

                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <!-- end of add arrows -->

                    </div> <!-- end of swiper-container -->
                </div> <!-- end of slider-container -->
                <!-- end of card slider -->

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of slider-2 -->
<!-- end of testimonials -->
