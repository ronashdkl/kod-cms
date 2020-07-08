<?php


namespace ronashdkl\kodCms\commands;


use ronashdkl\kodCms\modules\admin\models\Post;
use yii\console\Controller;
use yii\httpclient\Client;

class ApiController extends Controller
{
    public $url;
    public function options($actionID)
    {
        return array_merge(parent::options($actionID), [
            'url'
        ]);
    }
    public function actionGetPost()
    {

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('GET')
            ->setUrl($this->url)
            ->send();
        if ($response->isOk) {
            $data = $response->getData();
            $product =$data['nodes'][0]['node'];


            $post = new Post();
            $post->setAttributes($product);
            if($product['completed']=='Ja'){
                $post->completed = 1;
            }
            $post->isApi = true;
            $post->tree_id  = 3;
            $post->id = (int)$product['id'];
            if($post->save()){

                return "success";
            }else{
                foreach ($post->getErrorSummary(true)as $error){
                    echo $error."\n";
                };
            };
        }


    }
}