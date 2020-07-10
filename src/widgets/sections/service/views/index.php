<?php
/**
 * @var \ronashdkl\kodCms\models\service\ServiceModel $model
 * @var \ronashdkl\kodCms\models\service\ServiceListModel $list
 *
 */
?>
<!-- Services -->
<div id="services" class="cards-1">
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
                   <!-- Card -->
                   <div class="card">
                       <img class="card-image" src="<?=$list->image??'/images/services-icon-1.svg'?>" alt="alternative">
                       <div class="card-body">
                           <h4 class="card-title"><?=$list->name?></h4>
                           <p class="p-heading p-large"><?=$list->summary?></p>
                       </div>
                   </div>
                   <!-- end of card -->
                <?php
               }
               ?>



            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of cards-1 -->
<!-- end of services -->
