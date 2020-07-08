<?php


namespace ronashdkl\kodCms\models;


use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\VarDumper;

abstract class ListModel extends Model implements ListModelInterface
{

    public $id;

    public function init()
    {
        parent::init();
        $this->createdId();
    }

    public function rules()
    {
        return [
            ['id', 'safe']
        ];
    }

    public function getNameOfClass()
    {
        $path = explode('\\', get_called_class());
        return array_pop($path);

    }

    public function createdId()
    {
        if ($this->id == null) {
            $this->id = uniqid('id_');

        }
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

}