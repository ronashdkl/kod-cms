<?php
/**
 * Created by PhpStorm.
 * User: ronash
 * Date: 2019-06-12
 * Time: 18:37
 */

namespace ronashdkl\kodCms\widgets\config;

use ronashdkl\kodCms\models\language\LanguageModel;
use ronashdkl\kodCms\modules\admin\exceptions\MethodException;
use yii\base\Widget;
use yii\helpers\VarDumper;

class FormFieldWidget extends Widget
{
    public $model;
    public $form;
    public $group;
    public function run()
    {
        parent::run();
        if(!$this->model->hasMethod('formTypes')){
          return "formTypes() is not declare in ".get_class($this->model);
        }
        $fields = $this->model->formTypes();
       /* if (isset($this->model->languageAttributes) &&  $this->model->languageAttributes!= null) {
            $languageModel = new LanguageModel();
            $language = $languageModel->list;
        } else {
            $language = [];
        }*/
        return $this->render('field', ['form' => $this->form, 'model' => $this->model, 'fields' => $fields,'language'=>[],'group'=>$this->group]);
    }
}
