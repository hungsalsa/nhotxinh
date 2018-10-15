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
            [['pro_name', 'description', 'content', 'product_category_id', 'created_at', 'updated_at', 'user_id'], 'required'],
            [['keyword', 'description', 'short_introduction', 'content', 'product_type_id'], 'string'],
            [['price', 'price_sales', 'order', 'manufacturer_id', 'guarantee', 'views', 'product_category_id', 'created_at', 'updated_at', 'user_id'], 'integer'],
            [['start_sale', 'end_sale'], 'safe'],
            [['pro_name', 'title', 'slug', 'models_id', 'code', 'image', 'images_list', 'tags', 'related_articles', 'related_products'], 'string', 'max' => 255],
            [['active', 'salse', 'hot', 'best_seller'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pro_name' => 'Pro Name',
            'title' => 'Title',
            'slug' => 'Slug',
            'keyword' => 'Keyword',
            'description' => 'Description',
            'short_introduction' => 'Short Introduction',
            'content' => 'Content',
            'price' => 'Price',
            'price_sales' => 'Price Sales',
            'start_sale' => 'Start Sale',
            'end_sale' => 'End Sale',
            'order' => 'Order',
            'active' => 'Active',
            'product_type_id' => 'Product Type ID',
            'salse' => 'Salse',
            'hot' => 'Hot',
            'best_seller' => 'Best Seller',
            'manufacturer_id' => 'Manufacturer ID',
            'guarantee' => 'Guarantee',
            'models_id' => 'Models ID',
            'views' => 'Views',
            'code' => 'Code',
            'image' => 'Image',
            'images_list' => 'Images List',
            'tags' => 'Tags',
            'product_category_id' => 'Product Category ID',
            'related_articles' => 'Related Articles',
            'related_products' => 'Related Products',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
        ];
    }

    public function getAllPro()
    {
        return ArrayHelper::map(Product::find()->where('active =:status',['status'=>1])->orderBy(['pro_name'=>SORT_DESC])->all(),'id','pro_name');
    }

    function getProinfo($id)
    {
        $data =  Product::find()->asArray()->where('active =:status AND id =:ID',['status'=>1,'ID'=>$id])->one();
        return array('id'=>$data['id'],'pro_name'=>$data['pro_name']);
    }
}
