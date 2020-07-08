<?php
namespace ronashdkl\kodCms\models;

use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\widgets\WidgetList;

/**
 * Class WidgetModel
 * @package ronashdkl\kodCms\models
 *
* ['topHeader' => TopHeaderWidget::class,
* 'Header' => HeaderWidget::class,
* HolidaySliderWidget::navId() => HolidaySliderWidget::class,
* 'breadCrumb'=>BreadCrumbWidget::class,
* PageMenuWidget::navId() => PageMenuWidget::class,
* AboutListSectionWidget::navId()=>AboutListSectionWidget::class,
* MethodologiesSectionWidget::navId()=>MethodologiesSectionWidget::class,
* ServicesSectionWidget::navId()=>ServicesSectionWidget::class,
* PortfolioSectionWidget::navId()=>PortfolioSectionWidget::class,
* TestimonialsSectionWidget::navId()=>TestimonialsSectionWidget::class,
* ClientsSectionWidget::navId()=>ClientsSectionWidget::class,
* CookiesWidget::navId()=>CookiesWidget::class,
* ]
 */
class WidgetModel extends BaseModel{

    public $name;

    public function init()
    {
        parent::init();
        if($this->name==null){
           $this->name = json_encode(WidgetList::name());
        }
    }

    public function rules()
    {
        return [['name','safe']];
    }
    public function formTypes()
    {
        return [
            'name'=>[
                'type'=>FieldConfig::JSON,
               // 'mode'=>'json'
            ]
        ];
    }
    public function getData(){
        return json_decode($this->name);
    }
}
