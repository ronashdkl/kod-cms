<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\widgets\Pjax;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

  <!-- Logo -->
  <a href="/admin" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><?=$this->params['config']('short_name')??'KCMS'?></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><?=$this->params['config']('name')??'kodCMS'?></span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <li>
          <a href="/admin/notice" class="dropdown-toggle">
            <i class="fa fa-newspaper-o"></i>
          </a>

        </li>
        <!-- Notifications: style can be found in dropdown.less -->

        <!-- Tasks: style can be found in dropdown.less -->
          <?php
          if(Yii::$app->appData->logs!=null && Yii::$app->controller->id !='log'){
              ?>
              <li class="dropdown tasks-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-flag-o"></i>
                      <span class="label label-danger"></span>
                  </a>

                  <ul class="dropdown-menu">
                      <li class="header"><?=Yii::t('admin','Site Logs')?></li>
                      <li>
                          <!-- inner menu: contains the actual data -->
                          <ul class="menu">
                              <?php
                              Pjax::begin([
                                  'id'=>'log-list'
                              ]);

                              foreach (Yii::$app->appData->logs as $log){
                                  ?>
                                  <li><!-- Task item -->
                                      <a role="modal-remote" href="/admin/log/view?id=<?=$log['id']?>">

                                              <?=$log['log']?>

                                      </a>
                                  </li>
                                  <?php
                              }
                              Pjax::end();
                              ?>

                              <!-- end task item -->

                          </ul>

                      </li>
                      <li class="footer">
                          <a data-pjax="1" role="modal-remote" href="/admin/log"><?=Yii::t('admin','View all logs')?></a>
                      </li>
                  </ul>
              </li>
          <?php
          }
          ?>

          <?php
          if(Yii::$app->appData->language->list!=null){
              ?>
              <li class="dropdown tasks-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-language"></i>
                      <span class="label label-danger"></span> <?=Yii::$app->language?>
                  </a>

                  <ul class="dropdown-menu">
                      <li class="header"><?=Yii::t('admin','Select Language')?></li>
                      <li>
                          <!-- inner menu: contains the actual data -->
                          <ul class="menu">
                              <li ><!-- Task item -->
                                  <a class="<?=(Yii::$app->language==Yii::$app->appData->language->default->code)?'active':null ?>" href=" <?= Url::to([str_replace(Yii::$app->language,'',Yii::$app->request->url), 'language' => Yii::$app->appData->language->default->code]) ?>">
                                      <?=Yii::$app->appData->language->default->name?>
                                  </a>
                              </li>
                              <?php

                              foreach (Yii::$app->appData->language->list as $lang){
                                  ?>
                                  <li ><!-- Task item -->
                                      <a class="<?=(Yii::$app->language==$lang->code)?'active':null ?>" href=" <?= Url::to([str_replace(Yii::$app->language,'',Yii::$app->request->url), 'language' => $lang->code]) ?>">
                                          <?=$lang->name?>
                                      </a>
                                  </li>
                                  <?php
                              }
                              ?>
                              <!-- end task item -->
                          </ul>

                      </li>

                  </ul>
              </li>
          <?php } ?>
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?=
              Html::img(Yii::$app->user->identity->profile->getAvatarUrl(230), [
                  'class' => 'user-image',
                  'alt' => Yii::$app->user->identity->username,
              ])
              ?>
            <span class="hidden-xs"><?=Yii::$app->user->identity->username ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
                <?=
                Html::img(Yii::$app->user->identity->profile->getAvatarUrl(230), [
                    'class' => 'img-circle',
                    'alt' => Yii::$app->user->identity->username,
                ])
                ?>

              <p>
                  <?=Yii::$app->user->identity->profile->name ?>
                <small> <?= Yii::t('app','Member Since')?> <?= date('d-M-Y',Yii::$app->user->identity->created_at); ?></small>
              </p>
            </li>


            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="/user/settings" class="btn btn-default btn-flat"><?=Yii::t('app','Profile')?></a>
              </div>
              <div class="pull-right">
                <a href="/user/logout" data-method="POST" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>

        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>

      </ul>
    </div>

  </nav>
</header>
