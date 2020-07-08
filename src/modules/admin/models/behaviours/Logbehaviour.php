<?php


namespace ronashdkl\kodCms\modules\admin\models\behaviours;


use ronashdkl\kodCms\modules\admin\models\Log;
use ronashdkl\kodCms\modules\admin\models\Post;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\VarDumper;

class Logbehaviour extends Behavior
{
public $attribute;
public $triggerEvent = true;
public $log;
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT=>'beforeInsert',
            ActiveRecord::EVENT_BEFORE_UPDATE=>'beforeUpdate',
            ActiveRecord::EVENT_BEFORE_DELETE=>'beforeDelete',
            Post::SOFT_DELETE=>'softDelete'
        ];
    }

    public function beforeInsert($event)
    {
    $log = new Log([
        'log'=>($this->log)?$this->log: $event->sender->{$this->attribute}." inserted into ".$event->sender->tableName(),
    ]);
    $log->save();

    }

    public function beforeUpdate($event)
    {
        if(!$this->triggerEvent){
            return;
        }

        $log = new Log([
            'log'=>($event->sender->log!=null)?$event->sender->log:$event->sender->{$this->attribute}." updated into ".$event->sender->tableName(),
        ]);
        $log->detail['changedAttributes'] = $event->sender->getDirtyAttributes();
        $log->save();
    }

    public function beforeDelete($event)
    {
        $log = new Log([
            'log'=>$event->sender->{$this->attribute}." force deleted from ".$event->sender->tableName(),
        ]);
        $log->save();
    }
    public function softDelete($event)
    {
        $log = new Log([
            'log'=>$event->sender->{$this->attribute}." moved to trash",
        ]);
        $log->detail['changedAttributes'] = $event->sender->getDirtyAttributes();

        $log->save();
    }


}
