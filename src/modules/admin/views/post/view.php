<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Current Post');
\yii\web\YiiAsset::register($this);
?>
<style>
    .unseen {
        background: #222d32 !important;
        color: #fff;
        font-weight: 600;
    }
</style>
<div class="post-view">
    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a>
            </li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                                       data-toggle="tab">information</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <div class="panel">
                    <div class="panel-heading pull-right">

                        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                    </div>
                    <div class="panel-body">

                        <?= $model->body; ?>




                    </div>
                    <div class="panel-footer">
                        <?= $this->render('_action') ?>
                    </div>
                </div>

            </div>
            <div role="tabpanel" class="tab-pane" id="profile">
                <div class="panel">
                    <div class="panel-heading pull-right">

                        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                    </div>
                    <div class="panel-body">
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                'catalog.name',
                                'title',
                                'hide_language',

                                'images:ntext',
                                'draft',
                                'featured',
                                'published',
                                'schedule_date',
                                'published_date',
                                'slug',
                                'created_at',
                                'created_by',
                                'updated_at',
                                'updated_by',
                                'removed_at',
                                'removed_by',
                            ],
                        ]) ?>

                    </div>
                    <div class="panel-footer">
                        <?= $this->render('_action') ?>
                    </div>
                </div>
            </div>

        </div>

    </div>


</div>

