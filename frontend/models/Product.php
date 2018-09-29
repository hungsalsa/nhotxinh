<?php

namespace frontend\models;

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
 * @property string $start_sale
 * @property string $end_sale
 * @property int $price_sales
 * @property int $order
 * @property int $active
 * @property int $product_type_id
 * @property int $salse
 * @property int $hot
 * @property int $best_seller
 * @property int $new
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
            [['keyword', 'description', 'short_introduction', 'content'], 'string'],
            [['price', 'price_sales', 'order', 'manufacturer_id', 'guarantee', 'views', 'product_category_id', 'created_at', 'updated_at', 'user_id'], 'integer'],
            [['start_sale', 'end_sale'], 'safe'],
            [['pro_name', 'title', 'slug', 'product_type_id', 'models_id', 'code', 'image', 'images_list', 'tags', 'related_articles'], 'string', 'max' => 255],
            [['active', 'salse', 'hot', 'best_seller', 'new'], 'string', 'max' => 4],
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
            'active' => 'Kích hoạt',
            'product_type_id' => 'Loại sản phẩm',
            'salse' => 'Salse',
            'hot' => 'Hot',
            'best_seller' => 'Best Seller',
            'new' => 'New',
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
        ];
    }

    public function getAllProduct($limit=5,$category=array())
    {
            if(!empty($category)){ 
                $query = Product::find()->asArray()->where('product_category_id =:proCat AND active =:status',['proCat'=>$category,'status'=>1])->orderBy(['created_at' => SORT_DESC, ]) ->limit($limit)->all();
            }else{
                $query = Product::find()->where(['active'=>1])->orderBy(['created_at' => SORT_DESC, ]) ->limit($limit)->all();
            }
            
        return $query;
    }
    public function getAllProByid($category=array())
    {
            if(!empty($category)){ 
                $query = Product::find()->asArray()->where('product_category_id =:proCat AND active =:status',['proCat'=>$category,'status'=>1])->orderBy(['created_at' => SORT_DESC, ])->all();
            }else{
                $query = Product::find()->where(['active'=>1])->orderBy(['created_at' => SORT_DESC, ]) ->limit($limit)->all();
            }
            
        return $query;
    }

    public function getProductRandon($limit)
    {
        // User::find()->where(['category_id'=> 5])->orderBy(['rand()']);
        return Product::find()->asArray()->where('active =:status',['status'=>1])->orderBy(['created_at' => SORT_DESC,'rand()' => SORT_DESC])->limit($limit)->all();
    }

    public function getAllProductByCateId($catId)
    {
        return Product::find()->asArray()->where(['in', 'product_category_id', $catId])->orderBy(['created_at' => SORT_DESC, ])->all();
        // return Product::find()->asArray()->where('product_category_id =:proCat AND active =:status',['proCat'=>$catId,'status'=>1])->orderBy(['created_at' => SORT_DESC, ])->all();
    }

    public function getProByCateIdType($catId,$proType)
    {
        return Product::find()->asArray()->where('product_category_id =:proCat AND product_type_id =:proType AND active =:status',['proCat'=>$catId,'proType'=>$proType,'status'=>1])->orderBy(['created_at' => SORT_DESC, ])->all();
    }

    public function getProByType($type)
    {
        $product = $this->getAllProduct(100,array());
        $list_product = array();
        foreach ($product as $value) {
            $product_type_id = json_decode($value['product_type_id']);
            if ( count($product_type_id) && in_array($type,$product_type_id) ) {
                $list_product[$value['id']] = $value;
            }
        }
        return $list_product;
    }

    public function getProductById($id)
    {
        return Product::find()->asArray()->where('id =:idPro AND active =:status',['idPro'=>$id,'status'=>1])->one();
    }

}
