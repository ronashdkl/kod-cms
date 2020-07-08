<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
//$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\Gallery */
?>
<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">information</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <div class="panel">
                <div class="panel-heading">


                    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                </div>

                <div class="panel-footer">
                    <?=$this->render('_action')?>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="profile">
            <div class="panel">
                <div class="panel-heading ">

                    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

                </div>
                <div class="panel-body">
                    <div class="gallery-view">

                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => $model->safeAttributes(),
                        ]) ?>

                    </div>

                </div>
                <div class="panel-footer">
                    <?=$this->render('_action')?>
                </div>
            </div>
        </div>

    </div>

</div>

