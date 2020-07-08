<?php


namespace ronashdkl\kodCms\widgets;


use ronashdkl\kodCms\widgets\sections\about\StickyAssets;
use ronashdkl\kodCms\widgets\sections\SectionWidget;
use yii\base\Widget;
use yii\helpers\VarDumper;

class PageContentWidget extends SectionWidget
{
    public $model;

    public static function navId()
    {
        return 'PageContentWidget';
    }

    public function run()
    {
        parent::run();
       if(!$this->model){
           return null;
       }
        if ($this->model->avatar != null) {
            return $this->renderWithAvatar();
        }

        return $this->render('pageContent', ['content' => $this->model->body,'title'=>$this->model->title]);
    }

    private function renderWithAvatar()
    {
        if(isset($this->model->sticky_avatar) && $this->model->sticky_avatar) {
            $this->getView()->registerAssetBundle(StickyAssets::class);
            $this->getView()->registerJs("
var sidebar = new StickySidebar('#sidebar', {
        containerSelector: '#main-content',
        innerWrapperSelector: '.sidebar__inner',
        topSpacing: 150,
        bottomSpacing:0,
        resizeSensor: true
    });
");
            $this->getView()->registerCss(".sidebar{
    will-change: min-height;
}

.sidebar__inner{
    transform: translate(0, 0); /* For browsers don't support translate3d. */
    transform: translate3d(0, 0, 0);
    will-change: position, transform;
}");
        }
        return $this->render('pageContentWithAvatar', ['title'=>$this->model->title,'content' => $this->model->body, 'avatar' => $this->model->avatar,'position'=>$this->model->avatar_position??0]);

    }
}
