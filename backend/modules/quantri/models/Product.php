<?php

namespace backend\modules\quantri\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "tbl_product".
 *
 * @property int $id
 * @property string $pro_name
 * @property string $title
 * @property string $slug
 * @property string $keyword
 * @property string $description
 * @property string $short_introduction
 * @property string $content
 * @property int $price
 * @property int $price_sales
 * @property string $start_sale
 * @property string $end_sale
 * @property int $order
 * @property int $active
 * @property string $product_type_id
 * @property int $salse
 * @property int $hot
 * @property int $best_seller
 * @property int $manufacturer_id Hãng sản xuất ra sản phẩm
 * @property int $guarantee
 * @property string $models_id Loại xe sử dụng sản phẩm
 * @property int $views
 * @property string $code Mã sản phẩm nếu có
 * @property string $image
 * @property string $images_list
 * @property string $tags
 * @property int $product_category_id
 * @property string $related_articles
 * @property string $related_products
 * @property int $created_at
 * @property int $updated_at
 * @property int $user_id
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pro_name', 'slug', 'description', 'content', 'product_category_id', 'created_at', 'updated_at', 'user_id','price_sales','manufacturer_id'], 'required'],
            [['keyword', 'description', 'short_introduction', 'content'], 'string'],
            [['price', 'price_sales', 'order', 'manufacturer_id', 'guarantee', 'views', 'product_category_id', 'created_at', 'updated_at', 'user_id'], 'integer'],
            [['start_sale', 'end_sale', 'models_id', 'related_articles', 'related_products'], 'safe'],
            [['pro_name', 'title', 'slug', 'code', 'image', 'images_list', 'tags'], 'string', 'max' => 255],
            [['active', 'salse', 'hot', 'best_seller'], 'string', 'max' => 4],
            [['pro_name', 'slug'], 'unique', 'targetAttribute' => ['pro_name', 'slug']],
            // , 'related_products' 'product_type_id', 'models_id',, 'related_articles' 
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pro_name' => 'Tên sản phẩm',
            'title' => 'Tiêu đề',
            'slug' => 'Đường dẫn',
            'keyword' => 'Keyword',
            'description' => 'Description',
            'short_introduction' => 'Mô tả ngắn',
            'content' => 'Chi tiết',
            'price' => 'Giá',
            'price_sales' => 'Giá bán',
            'start_sale' => 'Ngày đầu giảm giá',
            'end_sale' => 'Ngày cuối giảm giá',
            'order' => 'Sắp xếp',
            'active' => 'Trạng thái',
            'product_type_id' => 'Loại sản phẩm',
            'salse' => 'Salse',
            'hot' => 'Hot',
            'best_seller' => 'Best Seller',
            'manufacturer_id' => 'Hãng sản xuất',
            'guarantee' => 'Guarantee',
            'models_id' => 'Xe sử dụng',
            'views' => 'Số lượt xem',
            'code' => 'Mã sản phẩm',
            'image' => 'Ảnh đại diện',
            'images_list' => 'Images List',
            'tags' => 'Tags',
            'product_category_id' => 'Danh mục sản phẩm',
            'related_articles' => 'Bài viết liên quan',
            'related_products' => 'Sản phẩm liên quan',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
        ];
    }

    
    // Lay tat ca san pham
    public function getAllPro()
    {
        return ArrayHelper::map(Product::find()->where('active =:status',['status'=>1])->orderBy(['pro_name'=>SORT_DESC])->all(),'id','pro_name');
    }

    // Lay chi tiet san pham
    function getProinfo($id)
    {
        $data =  Product::find()->asArray()->where('active =:status AND id =:ID',['status'=>1,'ID'=>$id])->one();
        return array('id'=>$data['id'],'pro_name'=>$data['pro_name']);
    }


    // Hai ham de lien ket filter index
    public function getProductCategory()
    {
        return $this->hasOne(Productcategory::className(),['idCate'=>'product_category_id']);
    }

    public function getManufactures()
    {
        return $this->hasOne(Manufactures::className(),['idMan'=>'manufacturer_id']);
    }
    public function getModels()
    {
        return $this->hasOne(Models::className(),['id'=>'models_id']);
    }
}
