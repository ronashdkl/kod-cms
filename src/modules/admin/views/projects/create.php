<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\Post */

$this->title = Yii::t('app', 'Create Project');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app','Current Post');
?>
<?=$this->render('/post/_action',['class'=>'mb-2'])?>

<div class="post-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
