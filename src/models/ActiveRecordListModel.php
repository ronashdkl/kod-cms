<?php


namespace ronashdkl\kodCms\models;


use yii\base\Model;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\VarDumper;

abstract class ActiveRecordListModel extends ActiveRecord implements ListModelInterface
{

    public function getNameOfClass()
    {
        $path = explode('\\', get_called_class());
        return array_pop($path);
    }



    public  function getColumns()
    {

        $column = [
            [
                'class' => 'kartik\grid\CheckboxColumn',
                'width' => '20px',
            ],
            ['class' => 'yii\grid\SerialColumn'],


        ];
        foreach ($this->displayAttributes() as $attr) {
            $column[] = $attr;
        }
        $column[] = $this->actionColumn();
        return $column;

    }

    public  function actionColumn()
    {
        return [
            'class' => 'kartik\grid\ActionColumn',
            'dropdown' => false,
            'vAlign' => 'middle',
            'urlCreator' => function ($action, $model, $key, $index) {
                return Url::to(['add-list', 'key' => $index]);
            },
            'template' => '{update}{delete}',
            'updateOptions' => ['title' => 'Update', 'data-toggle' => 'tooltip', 'data-pjax' => 1, 'role' => 'modal-remote'],
            'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
                'data-confirm' => false, 'data-method' => false,// for overide yii data api
                'data-request-method' => 'delete',
                'data-toggle' => 'tooltip',
                'data-confirm-title' => 'Are you sure?',
                'data-confirm-message' => 'Are you sure want to delete this item'],
        ];
    }

    public function getToolBar(){
        return [
            ['content' =>
                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['role' => 'modal-remote', 'title' => 'Create new List', 'class' => 'btn btn-default', 'data-pjax' => 0]) .
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => 'Reset Grid']) .
                '{toggleData}' .
                '{export}'
            ],
        ];
    }
}