<?php


namespace ronashdkl\kodCms\models\post;


use ronashdkl\kodCms\models\category\CategoryModel;
use ronashdkl\kodCms\modules\admin\models\Post;

class PostModel extends Post
{

    public function afterFind()
    {
        parent::afterFind();
        $this->price = \Yii::$app->formatter->asCurrency($this->price);
        $this->title = ($this->get('title')!=null)?$this->get('title'):$this->title;
        $this->body = ($this->get('body')!=null)?$this->get('body'):$this->body;
        if($this->avatar==null){
            $this->avatar = 'https://dummyimage.com/320x240/19a5aa/ffffff.jpg&text='.$this->title;
        }
        $this->created_at = \Yii::$app->formatter->asDatetime($this->created_at,'php: d  M Y H:m');
        $this->updated_at = \Yii::$app->formatter->asDatetime($this->updated_at,'php: d  M Y H:m');
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(CategoryModel::className(), ['id' => 'tree_id']);
    }

}
