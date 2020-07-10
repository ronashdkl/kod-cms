<?php

namespace ronashdkl\kodCms\widgets\sections\details;

use ronashdkl\kodCms\models\detail\DetailModel;
use ronashdkl\kodCms\models\post\PostModel;
use ronashdkl\kodCms\widgets\sections\SectionWidget;

class PostDetailWidget extends SectionWidget{

    public static function navId()
    {
        return "PostDetail";
    }

    public function run()
    {
        parent::run();
        $model = new DetailModel();
        $post = null;
        if($model->post){
            $post = PostModel::findOne(['slug'=>$model->post]);
        }
        return $this->render('detail_one',['model'=>new DetailModel(),'post'=>$post]);
    }
}