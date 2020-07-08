<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel ronashdkl\kodCms\modules\admin\models\ClothSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cloths';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="card">
    <div class="card-header">
        <h3 class="card-title">Manage Cloth</h3>
        <div class="card-options">
            <a href="<?= \yii\helpers\Url::toRoute(['create'])?>" class="btn btn-primary btn-sm">Add New</a>

        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <?php Pjax::begin(); ?>
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'images:ntext',
                        'name',
                        'price',
                        'min_order',
                        //'vendor',
                        //'description:ntext',

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
    <div class="card-footer">
        <a href="<?= \yii\helpers\Url::toRoute(['/admin/order'])?>" class="btn btn-primary btn-sm">View Orders</a>

    </div>
</div>

