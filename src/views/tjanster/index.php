
<div class="banner_image text-center"><h2><?= $tjanster['name'];?></h2></div>
     <div class="container">
         <div class="main_content">
             <p style="margin: 20px;text-indent: 20px;"> <?= $tjanster['description'];?> </p>
                <div class="col-sm-12 text-center"><h5><?= Yii::t('app','Prisförfrågan')?></h5></div>
                    <div class="collapse show container" id="inquiry_form"><?= $this->render('../prisforfragan/_form',['model'=>$model])?></div>
                </div>
         </div>

