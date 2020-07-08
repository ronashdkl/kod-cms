<?php


namespace ronashdkl\kodCms\modules\admin\actions;


use ronashdkl\kodCms\config\AppData;
use ronashdkl\kodCms\models\post\PostModel;
use ronashdkl\kodCms\models\UserProject;
use ronashdkl\kodCms\modules\admin\models\Post;
use Yii;
use yii\base\Action;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;

class ActiveRecordViewAction extends Action
{

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function runWithParams($id)
    {
        $model = $this->controller->findModel($id,true);

        if ($model->tree_id == AppData::PROJECT) {
            return $this->projectView($id, $model);
        }

        if ($model->tree_id == AppData::TICKET) {
            return $this->ticketView($id, $model);
        }
        return $this->controller->render('view', [
            'model' => $model,


        ]);

    }

    private function projectView($id, $model)
    {
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
            } else {
                if (!UserProject::find()->where(['user_id' => $assignModel->user_id])->andWhere(['project_id' => $id])->exists()) {
                    if (!$assignModel->save()) {
                        $error = true;
                        Yii::$app->session->setFlash('error', $assignModel->getFirstError('project_id') . ' ' . $assignModel->getFirstError('user_id'));

                    }
                }
            }

            if (!$error) {
                unset($assign);
                unset($assignModel);
                Yii::$app->session->setFlash('success', 'Successfully Assigned');

                return $this->controller->render('project', [
                    'model' => $model,

                    'assignModel' => new UserProject()
                ]);
            }

        }
        return $this->controller->render('index', [
            'model' => $model,

            'assignModel' => $assignModel


        ]);


    }

    private function ticketView($id, $model)
    {

        return $this->controller->render('ticket', [
            'model' => $model,
        ]);


    }


}
