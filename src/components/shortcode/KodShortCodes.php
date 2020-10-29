<?php

namespace ronashdkl\kodCms\components\shortcode;

use ronashdkl\kodCms\shortcodes\KodCmsDemoShortCode;

use yii\base\Component;
use yii\base\Event;
use yii\base\Widget;


class KodShortCodes extends Component
{

   const  HOOKS_TAGS = 'kodShortCode_tags';

    public $eventClass = Widget::class;

    /**
     * List of  tags
     * @var ISCWidget[] $tags
     */
    public $tags = [
        KodCmsDemoShortCode::class
    ];


    /**
     * @param $body
     * @param ISCWidget $tag
     * @return string
     */
    public function render($body)
    {


        foreach ($this->tags as $tag) {
            $body = $this->replace($body,  $tag);
        }


        return $body;

    }




    private function replace($body,  $tag)
    {
        if(!method_exists($tag,'getCodeName')){
         return $body;
        }

        $name = $tag::getCodeName();

        if (empty($name) || strpos($body, $name) === false) {
            return $body;
        }


        return str_replace($name, $tag::widget(), $body);

    }

    public function getList()
    {
        $tags = [];
        foreach ($this->tags as $tag){
            $tags[$tag::getCodeName()] =  $tag::getSummary();
        }
        return $tags;
    }

    public function register(){

        $this->tags =  \Yii::$app->hooks->apply_filters($this::HOOKS_TAGS, $this->tags);
        if(YII_APP_ID!=1){
            return;
        }
        if ($this->eventClass){
            Event::on($this->eventClass,$this->eventClass::EVENT_AFTER_RUN,function($event){
                $event->result =  $this->render($event->result);
            });
        }else{
            \Yii::warning("Event class is missing on shortcodes",'application');
        }
    }

}
