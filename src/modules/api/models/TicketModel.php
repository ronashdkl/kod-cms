<?php


namespace ronashdkl\kodCms\modules\api\models;


use ronashdkl\kodCms\config\AppData;
use ronashdkl\kodCms\modules\admin\models\Post;

class TicketModel extends Post
{

    public function init()
    {
        parent::init();
       $this->tree_id = AppData::TICKET;
       $this->published = 1;
    }

    public function formName()
    {
        return '';
    }
}
