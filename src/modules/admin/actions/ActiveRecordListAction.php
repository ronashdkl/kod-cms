<?php


namespace ronashdkl\kodCms\modules\admin\actions;


use ronashdkl\kodCms\config\AppData;
use ronashdkl\kodCms\modules\admin\models\Post;
use lo\plugins\models\App;
use yii\base\Action;
use yii\helpers\Html;

class ActiveRecordListAction extends Action
{

    public $searchModelClass = null;
    public $type=null;

    public function init()
    {
        parent::init();
        if ($this->searchModelClass == null && isset($this->controller->searchModelClass)) {
            $this->searchModelClass = $this->controller->searchModelClass;
        }
    }

    public function run()
    {
        $request = \Yii::$app->request;
        $searchModel = new $this->searchModelClass;
        $dataProvider = $searchModel->search($request->getQueryParams());
        $dataProvider->query->published();
        switch ($this->type){
            case AppData::PROJECT:
                $dataProvider->query->projects();
                break;
            case AppData::TICKET:
                $dataProvider->query->tickets();
                break;
        }
        if ($request->isAjax) {
            return [
                'title' => "Projects",
                'content' => $this->renderAjax('/actions/active-record-list', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]),
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"])

            ];
        } else {
            return $this->controller->render('/actions/active-record-list', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);
        }


    }

}
