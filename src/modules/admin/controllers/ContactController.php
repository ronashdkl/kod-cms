<?php


namespace ronashdkl\kodCms\modules\admin\controllers;


use ronashdkl\kodCms\models\contact\Contact;
use ronashdkl\kodCms\models\contact\ContactModel;
use ronashdkl\kodCms\models\contact\ContactSearch;
use ronashdkl\kodCms\modules\admin\components\AdminSiteController;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class ContactController extends AdminSiteController
{
    public $modelClass = ContactModel::class;

    public function actions()
    {
        $actions = parent::actions(); // TODO: Change the autogenerated stub
        unset($actions['bulk-delete']);
        return $actions;
    }

    public function actionIndex()
    {
        $searchModel = new ContactSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return parent::render('index', ['model' => $this->model, 'dataProvider' => $dataProvider, 'searchModel' => $searchModel]);
    }

    public function actionView($id)
    {
        $this->viewPath = \Yii::getAlias('@app/modules/admin/views/contact');

        $request = Yii::$app->request;
        if ($request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'title' => "Contact #" . $id,
                'content' => $this->renderAjax('view', [
                    'model' => $this->findModel($id),
                ]),
                'footer' => Html::button('Close', ['class' => 'btn btn-default pull-left', 'data-dismiss' => "modal"]) .
                    Html::a('Remove', ['delete', 'id' => $id], ['class' => 'btn btn-danger', 'role' => 'modal-remote'])
            ];
        } else {
            return $this->redirect('index');
        }
    }


    public function actionDelete($id)
    {
        $request = Yii::$app->request;
        $this->findModel($id)->delete();

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }


    public function actionBulkDelete()
    {
        $request = Yii::$app->request;
        $pks = explode(',', $request->post('pks')); // Array or selected records primary keys
        foreach ($pks as $pk) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if ($request->isAjax) {
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose' => true, 'forceReload' => '#crud-datatable-pjax'];
        } else {
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }

    }

    /**
     * Finds the Contact model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contact the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contact::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}