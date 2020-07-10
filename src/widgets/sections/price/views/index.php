<?php
/**
 * @var \ronashdkl\kodCms\models\price\PriceListModel $list
 * @var \ronashdkl\kodCms\models\price\PriceModel$model
 */
?>

<!-- Pricing -->
<div id="pricing" class="cards-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2><?=$model->title?></h2>
                <p class="p-heading p-large"><?=$model->summary?></p>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">


               <?php
               foreach ($model->list as $list){
                   ?>
                   <!-- Card-->
                   <div class="card">
                       <?php
                       if($list->price['isBest']){
                           ?>
                           <div class="label">
                               <p class="best-value">Best Value</p>
                           </div>
                       <?php
                       }
                       ?>
                       <div class="card-body">
                           <div class="card-title"><?=$list->name?></div>
                           <div class="card-subtitle"><?=$list->summary?></div>
                           <hr class="cell-divide-hr">
                           <div class="price">
                               <span class="currency"><?=$list->price['sign']?></span><span class="value"><?=$list->price['digit']?></span>
                               <div class="frequency"><?=$list->price['recuring']?></div>
                           </div>
                           <hr class="cell-divide-hr">
                           <ul class="list-unstyled li-space-lg">
                              <?php
                              try {
                              foreach ($list->getFeatures($list::TYPE_AVAILABLE) as $av){
                                  ?>
                                  <li class="media">
                                      <i class="fas fa-check"></i><div class="media-body"><?=$av?></div>
                                  </li>
                               <?php
                              }
                              }catch (Exception $e){
                                  ?>
                                  <li class="media">
                                      <i class="fas fa-check"></i><div class="media-body">Coming Soon</div>
                                  </li>
                               <?php
                              }
                              ?>
                               <?php
                               try {
                                   foreach ($list->getFeatures($list::TYPE_UNAVAILABLE) as $av){
                                       if($av==null) break;
                                       ?>


                                       <li class="media">
                                           <i class="fas fa-times"></i><div class="media-body"><?=$av?></div>
                                       </li>
                                       <?php
                                   }
                               }catch (Exception $e){
                                   ?>
                                   <li class="media">
                                       <i class="fas fa-times"></i><div class="media-body">Coming Soon</div>
                                   </li>
                                   <?php
                               }
                               ?>
                           </ul>
                           <div class="button-wrapper">
                               <a class="btn-solid-reg page-scroll" href="#request">REQUEST</a>
                           </div>
                       </div>
                   </div> <!-- end of card -->
                   <!-- end of card -->
                <?php
               }
               ?>

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of cards-2 -->
<!-- end of pricing -->
