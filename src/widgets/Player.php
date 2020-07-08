<?php
namespace ronashdkl\kodCms\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class Player extends Widget{
    public $code;
    public $width = '100%';
    public $height = '500px';
    public $rel = 0;
    public $frame = 0;


    public function run()
    {
        parent::run(); // TODO: Change the autogenerated stub
        /**
         *
        <iframe width="560" height="315" src="https://www.youtube.com/embed/AmpwXt2oY0E" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

         */
        return Html::tag('iframe',' ',['width'=>$this->width,'height'=>$this->height,'src'=>'https://www.youtube.com/embed/'.$this->code.'?rel='.$this->rel,'frameborder'=>$this->frame,'allow'=>'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture','allowfullscreen']);
    }

}
