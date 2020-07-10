<?php
/**
 * @var \ronashdkl\kodCms\models\detail\DetailModel $model
 * @var \ronashdkl\kodCms\models\post\PostModel $post
 */
$id = uniqid('');
?>

<!-- Details 1 -->
<div class="basic-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="text-container">
                    <h2><?=$model->title?></h2>
                    <p><?=$model->summary?></p>
                   <?php
                   if($model->post){
                       ?>
                       <a class="btn-solid-reg popup-with-move-anim" href="#<?=$id?>"><?=$model->post?></a>
                    <?php
                   }
                   ?>
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->
            <div class="col-lg-6">
                <div class="image-container">
                    <img class="img-fluid" src="<?=$model->image??'/images/details-1-office-worker.svg'?>" alt="alternative">
                </div> <!-- end of image-container -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of basic-1 -->
<!-- end of details 1 -->

<!-- Details Lightboxes -->

<?php
if($post){
    ?>
    <!-- Details Lightbox 1 -->
    <div id="<?=$id?>" class="lightbox-basic zoom-anim-dialog mfp-hide">
        <div class="container">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close x-button">×</button>
                <div class="col-lg-4">
                    <div class="image-container">
                        <img class="img-fluid" src="<?=$post->avatar??'/images/details-lightbox-1.svg'?>" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-8">
                    <h3><?=$post->title?></h3>
                    <hr>
                    <h5><?=$post->tag?></h5>
                    <?=$post->body?>
                    <!--<ul class="list-unstyled li-space-lg">
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">List building framework</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Easy database browsing</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">User administration</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Automate user signup</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Quick formatting tools</div>
                        </li>
                        <li class="media">
                            <i class="fas fa-check"></i><div class="media-body">Fast email checking</div>
                        </li>
                    </ul>-->
                    <a class="btn-solid-reg mfp-close page-scroll" href="#request">REQUEST</a> <a class="btn-outline-reg mfp-close as-button" href="#screenshots">BACK</a>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of lightbox-basic -->
    <!-- end of details lightbox 1 -->
<?php
}
?>


