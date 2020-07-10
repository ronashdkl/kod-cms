<?php

?>
<!-- Customers -->
<div class="slider-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h5>Trusted By</h5>

                <!-- Image Slider -->
                <div class="slider-container">
                    <div class="swiper-container image-slider">
                        <div class="swiper-wrapper">
                          <?php
                          /**
                           * @var  \ronashdkl\kodCms\models\client\ClientListModel $list
                           * @var  \ronashdkl\kodCms\models\client\ClientModel $model
                           */
                          foreach ($model->list as $list){
                              ?>
                              <div class="swiper-slide">
                                  <div class="image-container">
                                      <img class="img-responsive" src="<?= $list->image??'/images/customer-logo-1.png' ?>" alt="alternative">
                                  </div>
                              </div>
                            <?php
                          }
                          ?>

                        </div> <!-- end of swiper-wrapper -->
                    </div> <!-- end of swiper container -->
                </div> <!-- end of slider-container -->
                <!-- end of image slider -->

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of slider-1 -->
<!-- end of customers -->
