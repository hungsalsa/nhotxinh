<?php

namespace backend\modules\quantri\models;

use Yii;

/**
 * This is the model class for table "tbl_product_category".
 *
 * @property int $idCate
 * @property string $title
 * @property string $cateName
 * @property string $slug
 * @property string $keyword
 * @property string $description
 * @property string $content
 * @property string $short_introduction
 * @property int $home_page
 * @property string $image
 * @property int $order
 * @property int $active
 * @property int $product_parent_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $user_id
 */
class Productcategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_product_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'cateName', 'active', 'created_at', 'updated_at', 'user_id'], 'required','message'=>'{attribute} không được để trống'],
            [['keyword', 'description', 'content', 'short_introduction'], 'string'],
            [['order', 'product_parent_id', 'created_at', 'updated_at', 'user_id'], 'integer','message'=>'{attribute} không phải là số'],
            [['title', 'cateName', 'slug', 'image'], 'string', 'max' => 255],
            [['home_page', 'active'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCate' => 'Id Cate',
            'title' => 'Tiêu đề danh mục',
            'cateName' => 'Tên danh mục sp',
            'slug' => 'đường dẫn',
            'keyword' => 'Từ khóa',
            'description' => 'Description',
            'content' => 'Chi tiết',
            'short_introduction' => 'Giới thiệu ngắn',
            'home_page' => 'Hiện ở Home',
            'image' => 'Ảnh',
            'order' => 'Sắp xếp',
            'active' => 'Kích hoạt',
            'product_parent_id' => 'Danh mục cha',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày chỉnh sửa',
            'user_id' => 'user',
        ];
    }

    public $data;
    public function getCategoryParent($parent = 0,$level = '')
    {
        // var_dump($parent);
        // if(is_null($parent)){ echo 'ok';}
        // die;
        $result = Productcategory::find()->asArray()->where('product_parent_id =:parent',['parent'=>$parent])->all();
        $level .='--| ';
        foreach ($result as $key=>$value) {
            if($parent == 0){
                $level='';
            }
            $this->data[$value['idCate']] = $level.$value['cateName'];
            self::getCategoryParent($value['idCate'],$level);
        }

        return $this->data;
    }
}
