<?php

namespace ronashdkl\kodCms\config;

use ronashdkl\kodCms\helpers\HookActions;
use ronashdkl\kodCms\models\language\LanguageModel;
use ronashdkl\kodCms\models\post\PostWidgetModel;
use ronashdkl\kodCms\models\site\SiteModel;
use ronashdkl\kodCms\modules\admin\models\Log;
use ronashdkl\kodCms\widgets\PageMenuWidget;
use Yii;
use yii\base\Component;
use yii\helpers\VarDumper;

class AppData extends Component
{
    const BEFORE_HOMEPAGE_WIDGET_RENDER = 'homepage_widget_before_render';
    const BEFORE_PAGE_WIDGET_RENDER = 'homepage_widget_before_render';

    private $logs;
    public $seo;
    public $siteData;
    public $facebook;
    public $linkedin;
    public $instagram;
    public $language;
    public $map;

    public $widgets;


    public function init()
    {

        if (YII_APP_ID == 2) {
            $this->logs = Log::find()->limit(4)->orderBy('id desc')->asArray()->all();
        } else {
            $this->widgets = PostWidgetModel::getInstance();
        }
        $this->siteData = new SiteModel();
        $this->language = new LanguageModel();
        if (YII_APP_ID == 1) {
            Yii::$app->params['bsVersion'] = '4.x';
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

        $path = Yii::$app->request->pathInfo;

        return (in_array($path, ['site/index.html', ''])) ? true : false;


    }

    public function registerPageWidget()
    {
        if (Yii::$app->response->statusCode == 200) {
            $this->trigger(self::BEFORE_PAGE_WIDGET_RENDER);
            $widgetList = Yii::$app->widgetList->getAll();
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

    public function registerHomeWidgetV1()
    {
        if (Yii::$app->response->statusCode == 200 && Yii::$app->hooks->has_action(HookActions::RENDER_WIDGET)) {
            $this->trigger(self::BEFORE_HOMEPAGE_WIDGET_RENDER);
            //  $selectedWidgets = [];
            Yii::$app->getView()->beginBlock('top_content');
            Yii::$app->hooks->do_action(HookActions::RENDER_WIDGET);
            Yii::$app->getView()->endBlock();
        }
    }

    public function registerHomeWidget()
    {
        if (Yii::$app->response->statusCode == 200) {
            $this->trigger(self::BEFORE_HOMEPAGE_WIDGET_RENDER);
            $widgetList = Yii::$app->widgetList->getAll();
            $selectedWidgets = [];
            foreach ($this->widgets->home_page_content as $top) {
                if(isset($widgetList[$top])){
                    $selectedWidgets[] = $widgetList[$top];
                }

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
