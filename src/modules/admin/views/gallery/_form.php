<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin();
$model->published = 1;
?>
<div class="panel">
    <div class="panel-body">
        <div class="gallery-form">


            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <?= $form->field($model, 'published')->checkbox([1 => 'Yes', 0 => 'No']) ?>
                </div>
                <div class="col-sm-12 col-md-6">
                    <?= $form->field($model, 'featured')->checkbox([1 => 'Yes', 0 => 'No']) ?>

                </div>
            </div>


            <div class="tab-pane active" id="imgs">
                <br>
                <?= $form->field($model, 'media')
                    ->widget(alexantr\elfinder\InputFile::className(), [
                        'clientRoute' => '/admin/finder/galleryInput',
                        'filter' => ['image'],
                        'multiple' => true,

                    ]) ?>
                <div class="row">
                    <?php

                    if (!$model->isNewRecord) {

                        foreach ($model->getMedia() as $i => $img) {
                            ?>
                            <div class='col-sm-12 col-md-6 ' id='product-img-<?= $i ?>'>

                                <img class='img-thumbnail' src='<?= $img ?>'
                                     style='width:400px; height: 400px;'/>

                            </div>


                            <?php

                        }
                    }
                    ?>

                </div>
            </div>


        </div>
    </div>
    <div class="panel-footer">
        <?php if (!Yii::$app->request->isAjax) { ?>
            <div class="form-group ">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

        <?php } ?>
    </div>
</div>
<?php ActiveForm::end(); ?>
<?= $this->render('_action') ?>
