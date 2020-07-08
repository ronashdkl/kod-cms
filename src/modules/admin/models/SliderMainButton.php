<?php

namespace ronashdkl\kodCms\modules\admin\models;

use Yii;

/**
 * This is the model class for table "slider_main_button".
 *
 * @property int $id
 * @property int $slider_main_id
 * @property string $code
 *
 * @property SliderMain $sliderMain
 */
class SliderMainButton extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider_main_button';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slider_main_id'], 'integer'],
            [['code'], 'string', 'max' => 255],
            [['slider_main_id'], 'exist', 'skipOnError' => true, 'targetClass' => SliderMain::className(), 'targetAttribute' => ['slider_main_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'slider_main_id' => Yii::t('app', 'Slider Main ID'),
            'code' => Yii::t('app', 'Code'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSliderMain()
    {
        return $this->hasOne(SliderMain::className(), ['id' => 'slider_main_id']);
    }

    /**
     * {@inheritdoc}
     * @return SliderMainButtonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SliderMainButtonQuery(get_called_class());
    }
}
