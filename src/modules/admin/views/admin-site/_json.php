<?php


use kdn\yii2\JsonEditor;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;


Pjax::begin([
    'id' => 'jsoneditor-pjax',

]);
$form = ActiveForm::begin(['action' => 'update-json','method' => 'post']);
echo JsonEditor::widget(
    [
        // JSON editor options
        'clientOptions' => [
            'modes' => [ 'tree', 'view'], // available modes
            'mode' => 'view', // default mode
            'onModeChange' => 'function (newMode, oldMode) {console.log(this, newMode, oldMode);}',
        ],
        //'collapseAll' => ['view'], // collapse all fields in "view" mode
        'containerOptions' => ['class' => ''], // HTML options for JSON editor container tag
        'expandAll' => ['tree', 'view'], // expand all fields in "tree" and "form" modes
        'name' => $model->nameOfClass.'Json', // hidden input name
        'options' => ['id' => 'configjson'], // HTML options for hidden input
        'value' =>$model->JsonData, // JSON which should be shown in editor
    ]
);
ActiveForm::end();

Pjax::end();
