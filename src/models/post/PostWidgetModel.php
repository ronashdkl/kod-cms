<?php


namespace ronashdkl\kodCms\models\post;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\BaseModel;
use ronashdkl\kodCms\widgets\WidgetList;
use edwinhaq\simpleduallistbox\SimpleDualListbox;
use yii\helpers\ArrayHelper;

class PostWidgetModel extends BaseModel
{

    public $home_page_content;
    public $page_top_content;
    public $page_bottom_content;
    public $isMultilanguage = false;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        if ($this->page_top_content == "") {
            $this->page_top_content = [];
        }
        if ($this->page_bottom_content == "") {
            $this->page_bottom_content = [];
        }
        if ($this->home_page_content == "") {
            $this->home_page_content = [];
        }
    }

    public function rules()
    {
        return [[['page_top_content', 'page_bottom_content','home_page_content'], 'required']];
    }


    public function formTypes()
    {
        $items = WidgetList::getAll();
        $options = [];
        $options['size'] = 20;
        //  $options['style'] = 'width:200px';
        $options['options'] = [];

        $clientOptions = [];
        $clientOptions['availableListboxPosition'] = "left";    // options: left (default), right
        $clientOptions['availableListSort'] = SimpleDualListbox::$SORT_NUM_ASC;
        $clientOptions['upButtonText'] = "UP";
        $clientOptions['addButtonText'] = "ADD";
        $clientOptions['addAllButtonText'] = "ADDALL";
        $clientOptions['remAllButtonText'] = "REMALL";
        $clientOptions['remButtonText'] = "REM";
        $clientOptions['downButtonText'] = "DOWN";
        $clientOptions['selectedLabel'] = "Selected";
        $clientOptions['availableLabel'] = "Available";

        $widgetOptions = [];
        //$widgetOptions['label'] = 'InputLabel'; // Ignored when model is used
        //$widgetOptions['name'] = 'InputName'; // Ignored when model is used
        // $widgetOptions['hint'] = 'Hint'; // Ignored when model is used
        // $widgetOptions['selection'] = [1,2]; // Ignored when model is used
         $widgetOptions['id'] = uniqid(); // Optional
        $widgetOptions['template'] = '{label}{listbox}{hint}'; // Used to generate element, by default '{label}{listbox}{hint}'
        $widgetOptions['useGroupDiv'] = false; // true by default. Wrap element in a div tag: <div class="form-group"> ... </div>,
        $widgetOptions['items'] = $items;
        $widgetOptions['options'] = $options;
        $widgetOptions['clientOptions'] = $clientOptions;

        return [
            'home_page_content' => [
                'type' => FieldConfig::LISTBOX,
                'config' => $widgetOptions
            ]
            ,'page_top_content' => [
                'type' => FieldConfig::LISTBOX,
                'config' => $widgetOptions
            ],'page_bottom_content' => [
                'type' => FieldConfig::LISTBOX,
                'config' => $widgetOptions
            ]
        ];
    }

}
