<?php

use kartik\grid\BooleanColumn;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel ronashdkl\kodCms\modules\admin\models\ClothSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app','Post');
$this->params['breadcrumbs'][] = Yii::t('app',$this->title);
?>



<div class="panel">
    <div class="panel-heading">


            <a href="<?= \yii\helpers\Url::toRoute(['create'])?>" class="btn btn-primary btn-sm">Add New</a>



    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <?php Pjax::begin(); ?>
                <?php
                if(Yii::$app->controller->action->id=='trash'){
                    $date = 'removed_at';
                }elseif(Yii::$app->controller->action->id=='draft'){
                    $date = 'created_at';
                }else{
                    $date = 'updated_at';
                }
                ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'title',

                        $date,

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>

                <?php Pjax::end(); ?>
            </div>
            <div class="col-sm-12 col-md-4">
                <?= $this->render('_search',['model'=>$searchModel])?>

            </div>
        </div>

    </div>
    <div class="panel-footer">
        <?=$this->render('_action')?>
      </div>
</div>

