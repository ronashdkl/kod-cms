<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
$this->title = $model->name;
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
                <div class="panel-body mb-2">
<div class="row">
                    <?php

                    foreach ($model->getMedia() as $img){
                        echo Html::tag('div',Html::img($img,['style'=>'weight:400px;height:400px']),['class'=>'col-sm-12 col-md-6']);

                    }
echo "<hr>";
                    echo $model->body;
                    ?>
                </div>
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
                            'attributes' => [

                                'name',
                                'draft',
                                'featured',
                                'published',
                                'created_at',
                                'created_by',
                                'updated_at',
                                'updated_by',
                                'removed_at',
                                'removed_by',
                            ],
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

