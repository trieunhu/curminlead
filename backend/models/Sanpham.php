<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sanpham".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property integer $price
 * @property string $coupon
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Sanpham extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sanpham';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'image', 'price', 'coupon', 'created_at', 'updated_at'], 'required'],
            [['price', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'image', 'coupon'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'image' => 'Image',
            'price' => 'Price',
            'coupon' => 'Coupon',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
