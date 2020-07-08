<?php


namespace ronashdkl\kodCms\models\category;


use ronashdkl\kodCms\modules\admin\models\Tree;

class CategoryModel extends Tree
{
    public function afterFind()
    {
        parent::afterFind();
        $this->name = $this->get('name');
        $this->avatar = $this->getAvatar();
    }

    public function getAvatar()
    {
        if ($this->avatar == null) {
            return 'https://dummyimage.com/400x400/19a5aa/ffffff.jpg&text='.$this->name;
        } else {
            return $this->avatar;
        }
    }
}