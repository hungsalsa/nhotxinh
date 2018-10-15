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
            [['keyword', 'description', 'short_introduction', 'content'], 'string'],
            [['price', 'price_sales', 'order', 'manufacturer_id', 'guarantee', 'views', 'product_category_id', 'created_at', 'updated_at', 'user_id'], 'integer'],
            [['start_sale', 'end_sale'], 'safe'],
            [['pro_name', 'title', 'slug', 'product_type_id', 'models_id', 'code', 'image', 'images_list', 'tags', 'related_articles', 'related_products'], 'string', 'max' => 255],
            [['active', 'salse', 'hot', 'best_seller'], 'string', 'max' => 4],
            [['pro_name'], 'unique'],
            [['slug'], 'unique'],
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

    public function checkName($attribute) {  
        $pro = Product::find()->where('pro_name =:name AND active =:status',['name'=>$this->$attribute,'status'=>1])->all();
        if (count($pro) > 0) {
            $this->addError($attribute,  'Product name is already exists.');
        }
    }


    private function getNamePro($name)
    {
        $name = trim($name);
        return Product::find()->where('pro_name =:name',['name'=>$name])->count();
    }

    public function checkNamecreate($attribute, $params){
        if($this->getNamePro($this->$attribute)){
            $this->addError($attribute, 'Sản phẩm này đã có, mời chọn sản phẩm khác.');
        }
    }
    public function checklistArray($attribute, $params)
    {
        if (!is_array($this->$attribute) && $this->$attribute=='') {
            $this->addError($attribute, 'Không phải mảng.');
        }
    }

    public function checkurlCreate($attribute, $params)
    {
        $seo = new SeoUrl();
        $slug = $this->$attribute;
        $slug = trim($slug);
        $count = $seo->getCountSeoUrl($slug);
        if ($count) {
            $this->addError($attribute, 'đường dẫn này đã có');
        }
    }
    public function checkSlugUpdate($attribute, $params)
    {
        $seo = new SeoUrl();
        $slug = trim($this->$attribute);
        $url = $seo->getCountSeoUrl($slug);

        if (count($url) > 1 && is_array($url)) {
            $this->addError($attribute, 'đường dẫn này đã có '.$this->id);
        }
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


    public function getCategories()
    {
        return $this->hasOne(Productcategory::className(),['idCate'=>'product_category_id']);
    }

    public function getCatename()
    {
        return $this->categories->cateName;
    }

}
