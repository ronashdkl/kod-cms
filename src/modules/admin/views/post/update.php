<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\Post */

$this->title = Yii::t('app', 'Update Post: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Current Post'), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');

$plugins_render_sections = Yii::$app->hooks->apply_filters('plugin_post_update_section',[]);
?>
<?=$this->render('_action',['class'=>'mb-2'])?>

<div class="post-update">


    <?= $this->render('_form', [
        'model' => $model
    ]) ?>

    <?php

   foreach ($plugins_render_sections as $key=>$value){
       $args = array_merge(['post_id'=>$model->id],$plugins_render_sections[$key]['arguments']);
       echo $this->render($plugins_render_sections[$key]['template'],$args);
   }
    ?>
</div>

