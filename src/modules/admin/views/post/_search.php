<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\tree\TreeViewInput;
/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\PostSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>


    <?=$form->field($model, 'tree_id')->widget(
     TreeViewInput::className(),[
        // single query fetch to render the tree
        'query'             => \ronashdkl\kodCms\modules\admin\models\Tree::find()->addOrderBy('root, lft'),
        'headingOptions'    => ['label' => 'Categories'],
        'asDropdown'        => true,            // will render the tree input widget as a dropdown.
        'multiple'          => false,            // set to false if you do not need multiple selection
        'fontAwesome'       => true,            // render font awesome icons
        'rootOptions'       => [
            'label' => '<i class="fa fa-tree"></i>',
            'class'=>'text-success'
        ],                                      // custom root label
        //'options'         => ['disabled' => true],
    ]); ?>

    <?= $form->field($model, 'title') ?>


    <?php // echo $form->field($model, 'body') ?>

    <?php // echo $form->field($model, 'draft') ?>

    <?php // echo $form->field($model, 'featured') ?>

    <?php // echo $form->field($model, 'published') ?>

    <?php // echo $form->field($model, 'schedule_date') ?>

    <?php // echo $form->field($model, 'published_date') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <?php // echo $form->field($model, 'removed_at') ?>

    <?php // echo $form->field($model, 'removed_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
