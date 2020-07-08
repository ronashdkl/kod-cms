<?php


namespace ronashdkl\kodCms\modules\admin\models;


use yii\db\ActiveRecord;
use yii\helpers\Url;

abstract class BaseActiveRecord extends ActiveRecord
{
    public function getClassName()
    {
        return get_called_class();
    }

    abstract public function formTypes();

    abstract public function displayAttributes();

    public function getColumns()
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

    public function actionColumn()
    {
        return [
            'class' => 'kartik\grid\ActionColumn',
            'dropdown' => false,
            'vAlign'=>'middle',
            'urlCreator' => function($action, $model, $key, $index) {
                return Url::to([$action,'id'=>$key]);
            },
            'viewOptions'=>['title'=>'View','data-toggle'=>'tooltip','data-pjax'=>1,'role'=>'modal-remote'],
            'updateOptions'=>['title'=>'Update', 'data-toggle'=>'tooltip','data-pjax'=>1,'role'=>'modal-remote'],
            'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete',
                'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                'data-request-method'=>'post',
                'data-toggle'=>'tooltip',
                'data-confirm-title'=>'Are you sure?',
                'data-confirm-message'=>'Are you sure want to delete this item'],
        ];
    }
}