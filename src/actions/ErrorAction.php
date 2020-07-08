<?php


namespace ronashdkl\kodCms\actions;

use yii\httpclient\Client;

class ErrorAction extends \yii\web\ErrorAction
{
public function init()
{
    \Yii::$app->language='en-US';
    parent::init();
}

    public function run()
    {

        if($this->getExceptionCode()!=404){
           // $this->notifyError();
        }

        return parent::run(); // TODO: Change the autogenerated stub
    }

    public function notifyError(): void
    {
        try {


            $client = new Client();

            $response = $client->createRequest()
                ->setMethod('POST')
                ->setUrl('https://api.kodknackare.nu/site/listen-error')
                // ->setUrl('http://localhost/kodknackare/api/web/site/listen-error')
                ->setFormat(Client::FORMAT_JSON)
                ->addHeaders([
                    'content-type' => 'application/json',
                    'Authorization' => 'Bearer kgi^%$%_hf63rfy'
                ])
                ->setData(['project_id' => 6, 'title' => $this->getExceptionName()." ".$this->getExceptionCode(), 'message' => $this->exception->getMessage() . "\n" . $this->exception->getTraceAsString()])
                ->send();

        } catch (\Exception $e) {

        }
    }
}