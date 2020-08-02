<?php
use kartik\tree\TreeView;
use ronashdkl\kodCms\modules\admin\models\Tree;

echo TreeView::widget([
    // single query fetch to render the tree
    'query'             => Tree::find()->addOrderBy('root, lft'),
    'headingOptions'    => ['label' => 'Categories'],
    'isAdmin'           => Yii::$app->user->can('*'),                       // optional (toggle to enable admin mode)
    'displayValue'      => 1,                           // initial display value
    'softDelete'      => true,
'bsVersion'=>'3.x',
    'nodeAddlViews' => [
        \kartik\tree\Module::VIEW_PART_4 => '@kodCms/modules/admin/views/catalog/form'
    ]// normally not needed to change
    //'cacheSettings'   => ['enableCache' => true]      // normally not needed to change
]);
