<?php

use ronashdkl\kodCms\modules\admin\components\AdminView;
use johnitvn\ajaxcrud\CrudAsset;
use lo\modules\noty\Wrapper;
use yii\bootstrap\Modal;
use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */

/**
 * Do not use this code in your template. Remove it.
 * Instead, use the code `$this->layout = 'login';` in your controller.
 * (`yii\web\ErrorAction` also support changing layout by setting `layout` property)
 */
$action = Yii::$app->controller->action->id;
/*if (in_array($action, ['login', 'error'])) {

    echo $this->render('login', ['content' => $content]);
    return;
}*/

/**
 * You could set your AppAsset depended with AdminlteAsset
 */
// \backend\assets\AppAsset::register($this);
// \ronashdkl\kodCms\assets\AppAsset::register($this);
$adminlteAsset = \yidas\adminlte\AdminlteAsset::register($this);

$distPath = $adminlteAsset->baseUrl;
CrudAsset::register($this);

$adminView = new AdminView();
echo Wrapper::widget([
    'layerClass' => 'lo\modules\noty\layers\Growl',
    'options' => [
           'dismissQueue' => true,
           'layout' => 'bottomLeft',
           'timeout' => 3000,
          'theme' => 'relax',
           // and more for this library...
       ],
]);



?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
    <style>
        .menu>div>li{
            padding: 5px 5px;
            border: 1px #e8e8e8 solid;
        }
        .menu>div>li>a{
            color: #272727;
        }
        .skin-black .wrapper > .main-header, .skin-black-light .wrapper > .main-header {
            border-top: 6px solid #272727;
        }
        .menu>li>a.active{
            background:#00a65a;
            color: #fff;
        }
        .navbar-nav>.notifications-menu>.dropdown-menu>li .menu>li>a:hover, .navbar-nav>.messages-menu>.dropdown-menu>li .menu>li>a:hover, .navbar-nav>.tasks-menu>.dropdown-menu>li .menu>li>a:hover {
            background: #222d32;
            color: #fff;
            text-decoration: none;
        }
        .select2-container--krajee .select2-selection--multiple .select2-search--inline .select2-search__field {
            background: transparent;
            padding: 0 12px;
            height: 32px;
            line-height: 1.428571429;
            margin-top: 0;
            min-width: 10em;
        }
    </style>
    <link rel="shortcut icon" href="//favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
</head>
<body class="hold-transition <?= $adminlteAsset->skin?> sidebar-mini ">
<?php $this->beginBody() ?>
<div class="wrapper">

  <?= $this->render('main/header.php', [
      'directoryAsset' => $distPath
      ]) ?>

  <?= $this->render('main/aside.php', [
          'adminView'=>$adminView,
      'directoryAsset' => $distPath
      ]) ?>

  <?= $this->render('main/content.php', [
      'content' => $content, 'directoryAsset' => $distPath
      ]) ?>

</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    'size'=>Modal::SIZE_LARGE,

    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>

<?php $this->endBody() ?>

<?php
if (isset($this->blocks['customJs'])) {
    echo $this->blocks['customJs'];
}
?>
</body>
</html>
<?php $this->endPage() ?>

