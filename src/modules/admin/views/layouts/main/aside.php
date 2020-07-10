<?php

use ronashdkl\kodCms\modules\admin\components\AdminView;
use ronashdkl\kodCms\modules\admin\Module;
use ronashdkl\kodCms\widgets\AdminMenu;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\VarDumper;


?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?=
                Html::img(Yii::$app->user->identity->profile->getAvatarUrl(230), [
                    'class' => 'img-circle',
                    'alt' => Yii::$app->user->identity->username,
                ])
                ?>

            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->profile->name ?></p>
                <a href="/" target="_blank"><i class="fa fa-circle text-success"></i> Visit Site</a>
            </div>
        </div>
        <!-- search form -->
        <form action="/admin/search" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit"  id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?=
        AdminMenu::widget([
            'items' => Yii::$app->getModule('admin')->getMenu()
        ])
        ?>
    </section>
    <!-- /.sidebar -->
</aside>
