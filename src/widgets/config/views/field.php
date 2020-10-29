<?php
/**
 * Created by PhpStorm.
 * User: ronash
 * Date: 2019-06-12
 * Time: 18:38
 */

/**
 * @var LanguageListModel $language
 * @var array $fields
 * @var string $group
 */

use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\BaseModel;
use ronashdkl\kodCms\models\language\LanguageListModel;
use ronashdkl\kodCms\modules\admin\exceptions\PropertyException;

$config = new FieldConfig();

if($group!=null){

    $fields = array_filter($fields,function($key) use ($group, $fields){
        if(isset($fields[$key]['group']) && $fields[$key]['group']==$group){
            return true;
        }
        return false;
    },ARRAY_FILTER_USE_KEY );

}

foreach ($fields as $key => $field) {

    if (is_array($field)) {
        if (!isset($field['type'])) {
            throw new PropertyException('type is not mentioned inside ' . $model->nameOfClass . ' fieldTypes()');
        }
        if (!isset($field['config'])) {
            $field['config'] = [];
        }
        switch ($field['type']) {
            case $config::TEXTAREA:
                echo $form->field($model, $key)->textarea()->label($field['label']??null);
                echo (isset($field['hint'])) ? \yii\helpers\Html::tag('p', $field['hint']) : null;

                break;
            case $config::DATE:
                echo $form->field($model, $key)->widget(\yii\jui\DatePicker::className(), [
                    'language' => 'sv',
                    'dateFormat' => 'yyyy/MM/dd'
                ])->label($field['label']??null);
                echo (isset($field['hint'])) ? \yii\helpers\Html::tag('p', $field['hint']) : null;

                break;
            case $config::COLOR:
                echo $form->field($model, $key)->textInput(['type' => 'color', 'style' => ['width' => '52px'], $field['config']])->label($field['label']??null);
                echo (isset($field['hint'])) ? \yii\helpers\Html::tag('p', $field['hint']) : null;

                break;
            case $config::INPUT:
                /* if(!empty($language)){
                     foreach ($language as $lang){
                         echo $form->field($model, $key.'_'.$lang)->textInput($field['config']);
                     }
                 }else{
                     echo $form->field($model, $key)->textInput($field['config']);

                 }*/

                echo $form->field($model, $key)->textInput($field['config'])->label($field['label']??null);

                echo (isset($field['hint'])) ? \yii\helpers\Html::tag('p', $field['hint']) : null;

                break;
            case $config::SELECT:
                echo $form->field($model, $key)->widget(\kartik\select2\Select2::className(), $field['config'])->label($field['label']??null);
                echo (isset($field['hint'])) ? \yii\helpers\Html::tag('p', $field['hint']) : null;

                break;
            case $config::RADIO:
                echo $form->field($model, $key)->radioList($field['data'])->label($field['label']??null);
                echo (isset($field['hint'])) ? \yii\helpers\Html::tag('p', $field['hint']) : null;

                break;
            case $config::CHECKBOX:
                echo $form->field($model, $key)->checkboxList($field['data'])->label($field['label']??null);
                echo (isset($field['hint'])) ? \yii\helpers\Html::tag('p', $field['hint']) : null;

                break;
            case $config::IMAGE:
                echo $form->field($model, $key)
                    ->widget(alexantr\elfinder\InputFile::className(), [
                        'clientRoute' => '/admin/finder/widget',
                        'filter' => ['image'],
                        'multiple' => (isset($field['multiple'])) ? $field['multiple'] : false,
                        'preview' => function ($value) {
                            $img = explode(',', $value);
                            $html = null;

                            foreach ($img as $i) {
                                $html .= yii\helpers\Html::img($i, ['class' => 'img-thumbnail', 'style' => 'width: 150px; height:150px']);
                            }
                            return $html;
                        },
                    ])->label($field['label']??null);
                echo (isset($field['hint'])) ? \yii\helpers\Html::tag('p', $field['hint']) : null;

                break;
            case $config::CKEDITOR:
                $this->registerJs("CKEDITOR.plugins.addExternal('btgrid', '/ckeditor/btgrid/plugin.js', '');");
                $this->registerJs("CKEDITOR.plugins.addExternal('imageresponsive', '/ckeditor/imageresponsive/plugin.js', '');");
                echo $form->field($model, $key)
                    ->widget(\dosamigos\ckeditor\CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'preset' => 'full',

                        'clientOptions' => [

                            'filebrowserBrowseUrl' => yii\helpers\Url::to(['finder/ckeditor']),
                            'filebrowserImageBrowseUrl' => yii\helpers\Url::to(['finder/ckeditor', 'filter' => 'image']),
                            'extraPlugins' => 'btgrid,imageresponsive',
                        ]
                    ])->label($field['label']??null);
                echo (isset($field['hint'])) ? \yii\helpers\Html::tag('p', $field['hint']) : null;

                break;
            case $config::CODE:

                echo $form->field($model, $key)->widget(alexantr\ace\Ace::className(), [
                    'mode' => isset($field['mode']) ? $field['mode'] : 'html',
                    'theme' => isset($field['theme']) ? $field['theme'] : 'github',
                    'clientOptions' => [
                        'fontSize' => isset($field['font_size']) ? $field['font_size'] : '14',
                        'useSoftTabs' => true,
                        'maxLines' => 500, // need this option...
                    ],
                    'containerOptions' => [
                        'style' => 'min-height:150px', // ...or this style
                    ],
                ])->label($field['label']??null);
                echo (isset($field['hint'])) ? \yii\helpers\Html::tag('p', $field['hint']) : null;
                break;
            case $config::JSON:

                echo $form->field($model, $key)->widget(\kdn\yii2\JsonEditor::class, [
                    // JSON editor options
                    'clientOptions' => [
                        'id' => uniqid(),
                        'modes' => ['tree'], // available modes
                        'mode' => 'tree', // default mode
                        'onModeChange' => 'function (newMode, oldMode) {console.log(this, newMode, oldMode);}',
                    ],
                    //'collapseAll' => ['view'], // collapse all fields in "view" mode
                    'containerOptions' => ['class' => ''], // HTML options for JSON editor container tag
                    'expandAll' => ['tree', 'view'], // expand all fields in "tree" and "form" modes
                    //'name' => $model->nameOfClass.'Json', // hidden input name
                    'options' => ['id' => 'data'], // HTML options for hidden input
                    //'value' =>$model->JsonData, // JSON which should be shown in editor
                ])->label($field['label']??null);
                echo (isset($field['hint'])) ? \yii\helpers\Html::tag('p', $field['hint']) : null;
                break;

            case $config::LISTBOX:
                echo $form->field($model, $key)->widget(\edwinhaq\simpleduallistbox\SimpleDualListbox::class, $field['config'])->label($field['label']??null);
                echo (isset($field['hint'])) ? \yii\helpers\Html::tag('p', $field['hint']) : null;
                break;
            case $config::ICON:
                echo $form->field($model, $key)->textInput($field['config'])->label($field['label']??null);
                echo (isset($field['hint'])) ? \yii\helpers\Html::tag('p', $field['hint']) : null;
                break;
        }


    }
}

