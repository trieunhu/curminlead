<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sanpham".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property integer $price
 * @property string $coupon
 * @property integer $status
 * @property string $title1
 * @property string $title2
 * @property string $title3
 * @property string $mota1
 * @property string $mota2
 * @property string $mota3
 * @property integer $created_at
 * @property integer $updated_at
 */
class Sanpham extends BaseDB
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
            [['name', 'price', 'coupon', 'title1', 'title2', 'title3', 'mota1', 'mota2', 'mota3'], 'required'],
            [['price', 'status', 'created_at', 'updated_at','fb_image'], 'integer'],
            [['name', 'slug', 'coupon', 'title1', 'title2', 'title3', 'mota1', 'mota2', 'mota3', 'seo_title', 'seo_description', 'seo_keyword', 'fb_title', 'fb_description', 'slug'], 'string', 'max' => 255],
        ];
    }
    function getTitle(){
        return $this->title1;
    }
    function getDescription(){
        return $this->mota1;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'price' => 'Price',
            'coupon' => 'Coupon',
            'status' => 'Status',
            'title1' => 'Title1',
            'title2' => 'Title2',
            'title3' => 'Title3',
            'mota1' => 'Mota1',
            'mota2' => 'Mota2',
            'mota3' => 'Mota3',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'slug' => 'Slug',
            'seo_title' => "Seo Title",
            'seo_description' => "Seo Description",
            'seo_keyword' => "Keyword",
            'fb_title' => "Facebook Title",
            'fb_description' => 'FaceBook Description',
            'fb_image' => 'Ảnh FaceBook'
        ];
    }
}
