<?php

namespace backend\modules\quantri\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\models\User;
use backend\modules\quantri\models\related\ProductRelatedTypeInterdependent;
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
            /*[['pro_name', 'slug', 'description', 'content', 'product_category_id', 'created_at', 'updated_at', 'userCreated','price_sales','manufacturer_id','models_id'], 'required'],
            [['keyword', 'description', 'short_introduction', 'content'], 'string'],
            [['price', 'price_sales', 'order', 'manufacturer_id', 'guarantee', 'views', 'product_category_id', 'created_at', 'updated_at', 'models_id', 'userCreated'], 'integer'],
            [['start_sale', 'end_sale', 'related_articles', 'related_products'], 'safe'],
            [['pro_name', 'title', 'slug', 'code', 'image', 'images_list', 'tags'], 'string', 'max' => 255],
            // [['active', 'salse', 'hot', 'best_seller'], 'string', 'max' => 4],
            [['pro_name', 'slug'], 'unique', 'targetAttribute' => ['pro_name', 'slug']],
            [['pro_name'], 'unique'],*/
            // , 'related_products' 'product_type_id', 'models_id',, 'related_articles'

            [['pro_name', 'slug', 'description', 'content', 'product_category_id', 'created_at', 'updated_at', 'userCreated', 'userUpdated'], 'required'],
            [['keyword', 'description', 'short_introduction', 'content'], 'string'],
            [['price', 'price_sales', 'order', 'manufacturer_id', 'guarantee', 'models_id', 'views', 'product_category_id', 'created_at', 'updated_at', 'userCreated', 'userUpdated'], 'integer'],
            [['start_sale',  'product_type_id', 'end_sale', 'related_articles', 'related_products'], 'safe'],
            [['pro_name', 'title', 'slug','code', 'image', 'images_list', 'tags'], 'string', 'max' => 255],
            [['pro_name', 'slug'], 'unique', 'targetAttribute' => ['pro_name', 'slug']],
            ['pro_name', 'unique','message' => '{attribute} đã tồn tại, bạn hãy chọn tên khác' ],

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
            'active' => 'Kích hoạt',
            'product_type_id' => 'Loại sản phẩm',
            'salse' => 'Giảm giá',
            'hot' => 'Nổi bật',
            'best_seller' => 'Bán chạy',
            'manufacturer_id' => 'Hãng sản xuất',
            'guarantee' => 'Bảo hành',
            'models_id' => 'Xe sử dụng',
            'views' => 'Số lượt xem',
            'code' => 'Mã sản phẩm',
            'image' => 'Ảnh đại diện',
            'images_list' => 'Images List',
            'tags' => 'Tags',
            'product_category_id' => 'Danh mục sản phẩm',
            'related_articles' => 'Bài viết liên quan',
            'related_products' => 'Sản phẩm liên quan',
            'userCreated' => 'User ID',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày sửa',
            'userCreated' => 'Người tạo',
            'userUpdated' => 'Người sửa',
        ];
    }

    public function getTypeproduct()
    {
        return $this->hasOne(ProductRelatedTypeInterdependent::className(),['pro_id'=>'id']);
    }
    public function getUserupdate()
    {
        return $this->hasOne(User::className(),['id'=>'userUpdated']);
    }
    public function getUseradd()
    {
        return $this->hasOne(User::className(),['id'=>'userCreated']);
    }

    // Laays tat ca cac vi tri cua san pham voi status vij tri = true
    public function getProtype($idPro)
    {
        $data = self::find()->alias('p')
        ->innerJoinWith([
            'typeproduct' => function($query) use ($searchword) {
                $query->where(['like', 'typeproduct.title', $searchword]);
            },
        ])
        ->all();
        return $data;
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
