<?php


namespace ronashdkl\kodCms\modules\admin\components;


use ronashdkl\kodCms\models\BaseModel;
use ronashdkl\kodCms\models\ListModel;
use ronashdkl\kodCms\models\StyleModel;
use ronashdkl\kodCms\modules\admin\actions\BulkDeleteAction;
use ronashdkl\kodCms\modules\admin\actions\ListAction;
use ronashdkl\kodCms\modules\admin\actions\SaveAction;
use ronashdkl\kodCms\modules\admin\actions\StyleAction;
use ronashdkl\kodCms\modules\admin\controllers\BaseController;
use ronashdkl\kodCms\modules\admin\exceptions\ModelException;
use yii\base\NotSupportedException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


/**
 * Class AdminSiteController
 * @package ronashdkl\kodCms\modules\admin\components
 * @property BaseModel $model
 * @property ListModel $listModel
 * @property StyleModel $styleModel
 * @property mixed $nameOfClass
 */
abstract class AdminSiteController extends BaseController
{
    protected $modelClass;

    public $model;


    public function init()
    {
        parent::init();
        $this->loadModel();
        $this->viewPath = \Yii::getAlias('@kodCms/modules/admin/views/admin-site');
        $this->view->title = ucfirst($this->id);
    }

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'bulk-delete' => ['POST'],
                    'add-list' => ['GET', 'POST', 'DELETE'],
                    'index' => ['GET'],
                ],
            ],
        ];
    }

    public function getNameOfClass()
    {
        $path = explode('\\', get_called_class());
        return array_pop($path);

    }

    public function actions()
    {
        $actions = parent::actions(); // TODO: Change the autogenerated stub
        $actions['update'] = ['class' => SaveAction::class];
        $actions['add-list'] = ['class' => ListAction::class, 'listModel' => $this->model->listModel];
        $actions['bulk-delete'] = ['class' => BulkDeleteAction::class];
        $actions['style'] = ['class' => StyleAction::class, 'styleModel' => $this->model->styleModel];
        return $actions;
    }

    public function actionIndex()
    {
        return $this->render('index', ['model' => $this->model]);
    }

    public function notFound()
    {
        throw new NotFoundHttpException(\Yii::t('app', 'The requested page does not exist.'));

    }

    protected function loadModel()
    {
        if ($this->modelClass == null) {
            throw new ModelException('Please declare $modelClass on ' . get_called_class());
        }
        $this->model = $this->modelClass::getInstance();
        if ($this->model instanceof BaseModel == false) {
            throw new NotSupportedException($this->modelClass . ' model is not support for this types of controller. $modalClass should be instance of ' . BaseModel::class, 501);

        }

    }
}
