<?php

namespace ronashdkl\kodCms\modules\admin\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $retail_id
 * @property int $product_id
 * @property int $quantity
 * @property double $price
 * @property string $vendor
 * @property string $notes
 * @property int $status
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['retail_id', 'product_id', 'quantity', 'status'], 'integer'],
            [['price'], 'number'],
            [['notes'], 'string'],
            [['vendor'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'retail_id' => 'Retail ID',
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'vendor' => 'Vendor',
            'notes' => 'Notes',
            'status' => 'Status',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \ronashdkl\kodCms\modules\admin\models\activeQuery\OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \ronashdkl\kodCms\modules\admin\models\activeQuery\OrderQuery(get_called_class());
    }
}
