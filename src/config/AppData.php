<?php

namespace ronashdkl\kodCms\config;

use ronashdkl\kodCms\models\contact\MapModel;
use ronashdkl\kodCms\models\language\LanguageModel;
use ronashdkl\kodCms\models\post\PostWidgetModel;
use ronashdkl\kodCms\models\seo\SeoModel;
use ronashdkl\kodCms\models\site\SiteModel;
use ronashdkl\kodCms\models\social\FacebookModel;
use ronashdkl\kodCms\models\social\InstagramModel;
use ronashdkl\kodCms\models\social\LinkedinModel;
use ronashdkl\kodCms\modules\admin\models\Log;
use ronashdkl\kodCms\modules\admin\Module;
use ronashdkl\kodCms\widgets\PageMenuWidget;
use ronashdkl\kodCms\widgets\WidgetList;
use Yii;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class AppData extends Component
{
    const SERVICES = 1; //map from db
    const TICKET = 2; //map from db
    const PAGE = 4; //map from db
    const CLIENT = 6; //map from db
    const Portfolio = 5; //map from db
    const TESTIMONIAL = 7; //map from db


    private $logs;
    public $seo;
    public $siteData;
    public $facebook;
    public $linkedin;
    public $instagram;
    public $language;
    public $map;

    public $widgets;

    public function __construct()
    {
        if (YII_APP_ID == 2) {
            $this->logs = Log::find()->limit(4)->orderBy('id desc')->asArray()->all();

        } else {
            $this->seo = new SeoModel();
            $this->facebook = new FacebookModel();
            $this->linkedin = new LinkedinModel();
            $this->instagram = new InstagramModel();
            $this->map = new MapModel();
            $this->widgets = new PostWidgetModel();


        }
        $this->siteData = new SiteModel();
        $this->language = new LanguageModel();
        if(YII_APP_ID==1){
            Yii::$app->params['bsVersion']='4.x';
        }

    }

    /**
     * @return Logs[]|array
     */
    public function getLogs()
    {
        return $this->logs;
    }

    public function get($path = null)
    {
        if ($path != null && $this->seo->hasProperty($path)) {
            return $this->seo->{$path};
        }
        return $this->seo;
    }

    public function isHome()
    {

        $path=Yii::$app->request->pathInfo;

        return (in_array($path,['site/index.html','']))?true:false;


    }

    public function registerPageWidget()
    {
        if(Yii::$app->response->statusCode == 200) {
            $widgetList = WidgetList::getAll();
            $selectedWidgets = ['top' => [], 'bottom' => []];
            foreach ($this->widgets->page_top_content as $top) {

                $selectedWidgets['top'][] = $widgetList[$top];

            }
            foreach ($this->widgets->page_bottom_content as $bottom) {
                $selectedWidgets['bottom'][] = $widgetList[$bottom];
            }

            Yii::$app->getView()->beginBlock('top_content');
            foreach ($selectedWidgets['top'] as $wtop) {


                    echo $wtop::widget();
            }
            Yii::$app->getView()->endBlock();

            Yii::$app->getView()->beginBlock('bottom_content');
            foreach ($selectedWidgets['bottom'] as $wbottom) {
                echo $wbottom::widget();
            }
            Yii::$app->getView()->endBlock();
        }
    }

    public function registerHomeWidget()
    {
        if(Yii::$app->response->statusCode == 200) {
        $widgetList = WidgetList::getAll();
        $selectedWidgets = [];
        foreach ($this->widgets->home_page_content as $top) {
            $selectedWidgets[] = $widgetList[$top];
        }


        Yii::$app->getView()->beginBlock('top_content');
            foreach ($selectedWidgets as $content) {

                if ($content == PageMenuWidget::class) {
                    echo PageMenuWidget::widget([
                        'list' => $selectedWidgets
                    ]);
                } else {
                    echo $content::widget();
                }
            }
            Yii::$app->getView()->endBlock();
        }
    }

}
