<?php


namespace ronashdkl\kodCms\modules\admin\controllers;


use ronashdkl\kodCms\config\AppData;
use ronashdkl\kodCms\models\post\PostModel;
use ronashdkl\kodCms\models\UserProject;
use ronashdkl\kodCms\modules\admin\actions\ActiveRecordListAction;
use ronashdkl\kodCms\modules\admin\actions\ActiveRecordViewAction;
use ronashdkl\kodCms\modules\admin\components\ActiveRecordController;
use ronashdkl\kodCms\modules\admin\models\Post;
use ronashdkl\kodCms\modules\admin\models\PostSearch;
use lo\plugins\models\App;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ProjectsController extends ActiveRecordController
{
    protected $searchModelClass = PostSearch::class;
    protected $modelClass = Post::class;

    public function actions()
    {
        return ArrayHelper::merge(parent::actions(), [
            'index' => [
                'class' => ActiveRecordListAction::class,
                'searchModelClass' => $this->searchModelClass,
                'type' => AppData::PROJECT
            ]
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $id = (int)$id;
        $model = $this->findModel($id, true);

        $assignModel = new UserProject();
        $assignModel->project_id = $id;
        if ($assignModel->load(Yii::$app->request->post())) {
            $error = false;
            if (is_array($assignModel->user_id)) {
                foreach ($assignModel->user_id as $user) {
                    $userProject = [
                        'user_id' => $user,
                        'project_id' => $id
                    ];
                    $assign = new UserProject();
                    if (!UserProject::find()->where(['user_id' => $user])->andWhere(['project_id' => $id])->exists()) {
                        $assign->setAttributes($userProject);
                        if (!$assign->save()) {
                            $error = true;

                            Yii::$app->session->setFlash('error', $assign->getFirstError('project_id') . ' ' . $assign->getFirstError('user_id'));
                        }
                    }
                }
            }

            if (!$error) {
                unset($assign);
                unset($assignModel);
                Yii::$app->session->setFlash('success', 'Successfully Assigned');

                return $this->redirect(['view', 'id' => $id]);
            }

        }
        return $this->render('/projects/index', [
            'model' => $model,

            'assignModel' => $assignModel


        ]);


    }


    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new $this->modelClass();
        $model->published = 1;
        $model->draft = 0;
        $model->tree_id = AppData::PROJECT;
        $model->body = $this->renderAjax('/post/_credentialTemplate');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param boolean $frontModel
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function findModel($id, $frontModel = false)
    {
        if ($frontModel) {
            if (($model = PostModel::findOne($id)) !== null) {
                return $model;
            }
        } else {
            if (($model = Post::findOne($id)) !== null) {
                return $model;
            }
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
