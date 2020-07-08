<?php


namespace ronashdkl\kodCms\controllers;

use yii;
use ronashdkl\kodCms\models\contact\Contact;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
use yii\web\Controller;

class KontaktController extends Controller
{

    public function actionIndex()
    {
        \Yii::$app->appData->registerPageWidget();
      

        return $this->render('index', ['model' => new Contact()]);
    }

    public function actionSend()
    {
        $request = \Yii::$app->request;
        $model = new Contact();
        if ($model->load($request->post()) && $model->validate()) {
            $mail =  \Yii::$app->mailer->compose('msg',['model'=>$model])
           ->setTo(Yii::$app->params['adminEmail'])
            ->setFrom(Yii::$app->params['senderEmail'])
                 ->setReplyTo([$model->email=>$model->full_name])
            ->setSubject($model->full_name.' skickar meddelande via webbplatsen')
            ->send();

            if($mail){
                \Yii::$app->session->setFlash('success', \Yii::t('site', 'Thank you for your intrest. We will contact you soon'));

            }else{
                Yii::$app->session->setFlash('info','We are unable to notify system admin, Please contact us to notify your form submission. ');

            }
              return $this->redirect('index');
        }else{
            \Yii::$app->session->setFlash('error', \Yii::t('site', 'Unable to verify your request'));
            return $this->redirect('index');

        }
    }
    
  
}
