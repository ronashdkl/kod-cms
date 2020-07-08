<?php

use yii\widgets\Breadcrumbs;

?>
<div class="content-wrapper">
    <section class="content-header mb-2">
        <?php if (isset($this->blocks['content-header'])) { ?>
            <h1><?= $this->blocks['content-header'] ?></h1>
        <?php } else { ?>
            <h1>
                <?php
                if ($this->title !== null) {
                    echo \yii\helpers\Html::encode($this->title);
                } else {
                    echo \yii\helpers\Inflector::camel2words(
                        \yii\helpers\Inflector::id2camel($this->context->module->id)
                    );
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                } ?>
            </h1>
        <?php } ?>


    </section>
    <?=
    Breadcrumbs::widget(
        [
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]
    ) ?>
    <section class="content">
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> <?=Yii::$app->version?>
    </div>
    <strong>Support <a href="mailto:support@kodknakcare.nu">kodCMS</a>.</strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="/admin/site-setting"><i class="fa fa-gear"></i> Full Screen</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">


        <!-- Settings tab content -->
        <div class="tab-pane active" id="control-sidebar-settings-tab">
            <?php
            $form = \yii\bootstrap\ActiveForm::begin(['action' => \yii\helpers\Url::toRoute(['/admin/site-setting/update', 'method' => 'post'])]);

           echo  \ronashdkl\kodCms\widgets\config\FormFieldWidget::widget([
                'model' => Yii::$app->appData->siteData,
                'form' => $form

            ]);
            echo \yii\helpers\Html::submitButton('save',['class'=>'btn btn-success']);
            \yii\bootstrap\ActiveForm::end();
            ?>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>
