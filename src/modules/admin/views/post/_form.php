<?php

use ronashdkl\kodCms\components\FieldConfig;
use kartik\file\FileInput;
use kartik\tree\TreeViewInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model ronashdkl\kodCms\modules\admin\models\Post */
/* @var $form yii\widgets\ActiveForm */

if (isset($model->languageAttributes) && $model->languageAttributes != null) {
    $multipleLanguage = true;
} else {
    $multipleLanguage = false;
}
$this->registerJs("CKEDITOR.plugins.addExternal('btgrid', '/ckeditor/btgrid/plugin.js', '');");
$this->registerJs("CKEDITOR.plugins.addExternal('imageresponsive', '/ckeditor/imageresponsive/plugin.js', '');");

$post_tab_nav = Yii::$app->hooks->apply_filters('post_tab_nav',[]);
$post_tab_content = Yii::$app->hooks->apply_filters('post_tab_content',[]);

?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>



    <div class=" ">

        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">

                            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">General</a></li>
                            <?php
                            foreach (Yii::$app->appData->language->list as $lang) {
                                ?>
                                <li class=><a href="#<?= $lang->code ?>" data-toggle="tab"
                                              aria-expanded="true"><?= $lang->name ?></a></li>
                            <?php } ?>
                            <li class=><a href="#mediaDiv" data-toggle="tab"
                                          aria-expanded="true">Media</a></li>
                            <?php
                            if($post_tab_nav){
                                foreach ($post_tab_nav as $id=>$name){
                                       echo '<li class=><a href="#'.$id.'" data-toggle="tab"
                                          aria-expanded="true">'.$name.'</a></li>';
                                }
                            }

                            ?>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">

                                <?= $form->field($model, 'tree_id')->widget(
                                    TreeViewInput::className(),
                                    [
                                        'id' => 'postType',
                                        // single query fetch to render the tree
                                        'query' => \ronashdkl\kodCms\modules\admin\models\Tree::find()->addOrderBy('root, lft'),
                                        'headingOptions' => ['label' => 'Categories'],
                                        'asDropdown' => true,            // will render the tree input widget as a dropdown.
                                        'multiple' => false,            // set to false if you do not need multiple selection
                                        'fontAwesome' => true,            // render font awesome icons
                                        'rootOptions' => [
                                            'label' => '<i class="fa fa-tree"></i>',
                                            'class' => 'text-success'
                                        ],                                      // custom root label
                                        //'options'         => ['disabled' => true],
                                    ]
                                ); ?>

                                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                                <?= $form->field($model, 'body')->widget(CKEditor::className(), [
                                    'options' => ['rows' => 6],
                                    'preset' => 'advanced',
                                    'clientOptions' => [
                                        'extraPlugins' => 'btgrid,imageresponsive',
                                    ]
                                ]) ?>

                                <?= $form->field($model, 'tag')->textarea() ?>



                            </div>
                            <?php
                            foreach (Yii::$app->appData->language->list as $lang) {
                                ?>
                                <div class="tab-pane" id="<?= $lang->code ?>">
                                    <div class="row" style="padding: 0px 10px">
                                        <?php
                                        if ($multipleLanguage) {
                                            foreach ($model->languageAttributes as $attr) {
                                                $field = $form->field($model, 'languageAttribute[' . $attr . '_' . $lang->code . ']')->label(ucfirst($attr));
                                                switch ($model->formTypes()[$attr]['type']) {
                                                    case FieldConfig::INPUT:
                                                        echo $field->textInput();
                                                        break;
                                                    case FieldConfig::CKEDITOR:
                                                        echo $field->widget(CKEditor::className(), [
                                                            'options' => ['rows' => 6],
                                                            'preset' => 'full',
                                                            'clientOptions' => [
                                                                'extraPlugins' => 'btgrid,imageresponsive',

                                                            ]
                                                        ]);
                                                        break;
                                                }
                                            }
                                        }
                                        ?>
                                    </div>

                                </div>
                            <?php } ?>
                            <div class="tab-pane" id="mediaDiv">

                                <?php
                                $imgs = [];
                                $config = [];
                                if ($model->getImages() != null) {
                                    foreach ($model->getImages() as $img) {
                                        $imgs[] = $img;
                                        $config[] = ['url' => ['/admin/api/remove-image'], 'key' => $model->id . "##" . $img,];
                                    }
                                }
                                echo $form->field($model, 'imageFiles')->widget(FileInput::classname(), [
                                    'options' => [
                                        'accept' => 'image/*',
                                        'multiple' => true
                                    ],
                                    'pluginOptions' => [
                                        'showPreview' => true,
                                        'showCaption' => false,
                                        'showRemove' => false,
                                        'showUpload' => false,
                                        'showCancel' => true,
                                        'initialPreview' => ($model->getImages() == null) ? [] : $model->getImages(),
                                        'initialPreviewConfig' => $config,
                                        'initialPreviewAsData' => true,
                                        'overwriteInitial' => true,
                                    ]
                                ]); ?>

                            </div>

                            <?php
                            if($post_tab_content){
                                foreach ($post_tab_content as $id=>$template){
                                    echo '<div class="tab-pane" id="'.$id.'">';
                                   echo $this->render($template,['form'=>$form,'model'=>$model]);
                                    echo '</div>';
                                }
                            }
                            ?>

                        </div>

                    </div>

                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="panel ">
                        <div class="panel-heading">
                            <strong>Publish Options</strong>
                        </div>
                        <div class="panel-body">

                            <?= $form->field($model, 'avatarImage')->widget(FileInput::classname(), [
                                'options' => [
                                    'accept' => 'image/*',
                                    'multiple' => false
                                ],
                                'pluginOptions' => [
                                    'showPreview' => true,
                                    'showCaption' => true,
                                    'showRemove' => true,
                                    'showUpload' => false,
                                    'showCancel' => true,
                                    'initialPreview' => ($model->avatar != null) ? $model->avatar : [],
                                    'initialPreviewAsData' => true,
                                    'initialPreviewConfig' =>  ['url' => ['/admin/api/remove-avatar'], 'key' => $model->id],
                                    'overwriteInitial' => true,
                                ]
                            ]); ?>
                            <button style="margin-bottom: 10px; display: <?=$model->avatar==null?'none':'block'?>" type="button" id="removeAvatar" class="btn btn-danger">Remove Avatar</button>

                            <?php
                            $this->registerJs('
                            $("#removeAvatar").on("click",function(e){
                           
                            if(window.confirm("Are you sure?")){
                            $.post("/admin/api/remove-avatar",{key:'.$model->id.'},function(res){
                            alert(res);
                            })
                            }
                            })
                            ',$this::POS_END);
                            ?>
                            <?= $form->field($model, 'avatar_position')->radioList($model::AVATAR_POSITION) ?>
                            <?= $form->field($model, 'sticky_avatar')->radioList([0=>'No',1=>'Yes']) ?>



                            <div class="row">

                            </div>
                            <?= $form->field($model, 'featured')->checkbox([1 => 'Yes', 0 => 'No']) ?>

                        </div>
                        <div class="panel-footer">
                            <div class="form-group">
                                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
