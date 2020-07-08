<?php

use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $assignModel \ronashdkl\kodCms\models\UserProject*/
/* @var $model ronashdkl\kodCms\modules\admin\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Current Post');
\yii\web\YiiAsset::register($this);

$hideCredential = true;
if ($model->tree_id == \ronashdkl\kodCms\config\AppData::PROJECT) {
    $hideCredential = false;
}
$data = $model->getUsers()->select('id,username')->asArray()->all();

?>
<style>
    .unseen {
        background: #222d32 !important;
        color: #fff;
        font-weight: 600;
    }
</style>
<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
            <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="<?=$model->avatar?>" alt="User profile picture">

                <h3 class="profile-username text-center"><?=$model->title?></h3>

                <p class="text-muted text-center"><?=$model->catalog->name?></p>

                <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                        <b><?=Yii::t('app','Tickets')?></b> <a class="pull-right"><?=$model->getTickets()->count()?></a>
                    </li>
                    <li class="list-group-item">
                        <b><?=Yii::t('app','Created at')?></b> <a class="pull-right"><?=$model->created_at?></a>
                    </li>
                </ul>

<!--                <a href="#" class="btn btn-primary btn-block"><b>Visit Project</b></a>-->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">About Project</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i>Assigned Clients</strong>
                <br><br>
                <script>
                    function newPopup(url) {
                        popupWindow = window.open(
                            url,'popUpWindow','height=400,width=400,left=50,top=10,resizable=no,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=yes')
                    }
                </script>
                <p>
                    <?php
                    foreach ($data as $user){
                        echo Html::a($user['username'],"JavaScript:newPopup('/user/".$user['id']."');",['class'=>'btn btn-sm btn-info'])." ";

                    }
                    ?>


                
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#description" data-toggle="tab" aria-expanded="true">Description</a></li>
                <li class=""><a href="#history" data-toggle="tab" aria-expanded="false">History</a></li>
                <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Settings</a></li>
            </ul>
            <br>
            <div style="margin-left: 10px">
                <a href="<?= \yii\helpers\Url::toRoute(['/admin/oauth-client/create'])?>" role="modal-remote" class="btn btn-info btn-sm">Oauth Client</a>
                <a href="<?= \yii\helpers\Url::toRoute(['/admin/projects/update/'.$model->id])?>" class="btn btn-info btn-sm">Update</a>


            </div>
            <br>
            <div class="tab-content">
                <div class="tab-pane active" id="description">

                    <?=$model->body;
                    ?>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="history">
                    <!-- The timeline -->
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'catalog.name',
                            'title',
                            'hide_language',
                            'running',
                            'completed',
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
                <!-- /.tab-pane -->

                <div class="tab-pane " id="settings">
                  <div class="well well-sm">
                      <strong><i class="fa fa-book margin-r-5"></i>Assign Clients</strong>
                      <?php
                      $form = \yii\bootstrap\ActiveForm::begin(['method'=>'POST']);
                      $assignModel->user_id = \yii\helpers\ArrayHelper::map($data,'id','username');

                      echo $form->field($assignModel, 'user_id')->widget(Select2::classname(), [
                          'options' => ['multiple'=>true, 'placeholder' => 'Search Users'],

                          'pluginOptions' => [
                              'allowClear' => true,
                              'minimumInputLength' => 3,
                              'language' => [
                                  'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                              ],
                              'ajax' => [
                                  'url' => Url::toRoute(['/admin/api/user-list']),
                                  'dataType' => 'json',
                                  'data' => new JsExpression('function(params) { return {q:params.term}; }')
                              ],
                              'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                              'templateResult' => new JsExpression('function(user) { return user.text; }'),
                              'templateSelection' => new JsExpression('function (user) {return user.text; }'),
                          ],
                          'pluginEvents' => [
    /*"change" => "function() { log('change'); }",
    "select2:opening" => "function() { log('select2:opening'); }",
    "select2:open" => "function() { log('open'); }",
    "select2:closing" => "function() { log('close'); }",
    "select2:close" => "function() { log('close'); }",
    "select2:selecting" => "function() { log('selecting'); }",
    "select2:select" => "function() { log('select'); }",*/
   // "select2:unselecting" => "function(e) { console.log(e) }"
   "select2:unselecting" => "function(e) { var id=".$model->id."; var _csrf = $('meta[name=\"csrf-token\"]').attr(\"content\"); var username=e.params.args.data.text; $.post('/admin/api/remove-user-from-project',{\"username\":username,\"id\":id,\"_csrf\":_csrf},function(res){if(res==true){return true;}else{return false}}) }"
]
                      ])->label(false);

                      echo Html::submitButton('Assign',['class'=>'btn btn-success']);
                      \yii\bootstrap\ActiveForm::end();
                      ?>
                  </div>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>


