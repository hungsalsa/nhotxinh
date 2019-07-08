<?php

namespace frontend\models\product;

use Yii;
use yii\data\Pagination;
class FProduct extends \yii\db\ActiveRecord
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
            [['pro_name', 'slug', 'description', 'content', 'product_category_id'], 'required'],
            [['keyword', 'description', 'short_introduction', 'content', 'related_articles', 'related_products'], 'string'],
            [['price', 'price_sales', 'order', 'manufacturer_id', 'guarantee', 'models_id', 'views', 'product_category_id', 'created_at', 'updated_at', 'userCreated', 'userUpdated'], 'integer'],
            [['start_sale', 'end_sale'], 'safe'],
            [['pro_name', 'title', 'slug', 'product_type_id', 'code', 'image', 'images_list', 'tags'], 'string', 'max' => 255],
            // [['active', 'salse', 'hot', 'best_seller'], 'string', 'max' => 4],
            [['pro_name', 'slug'], 'unique', 'targetAttribute' => ['pro_name', 'slug']],
            [['pro_name'], 'unique'],
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
    
    public function getImagepro()
    {
        return $this->hasMany(FImgproList::className(),['pro_id'=>'id']);
    } 
    public function getProtype()
    {
        return $this->hasMany(FProductRelatedTypeInterdependent::className(),['pro_id'=>'id']);
    }

    public function getNewProduct($limit=10)
    {
        return self::find()
        ->select(['id','pro_name','title','slug','price','price_sales','salse','image','created_at'])
        ->asArray()->where('active =:status',[':status'=>1])->orderBy(['created_at' => SORT_DESC,'order' => SORT_ASC])->limit($limit)->all();
    }

    public function getProductByCateID($cateId,$limit=10)
    {
        return self::find()
        ->select(['id','pro_name','title','slug','price','price_sales','salse','image','product_category_id','short_introduction'])
        ->asArray()
        ->where('active =:status',[':status'=>1])
        ->andWhere(['IN','product_category_id',$cateId])
        ->orderBy(['created_at' => SORT_DESC,'order' => SORT_ASC])->limit($limit)->all();
    }

    // Hamf lấy danh sách sản phẩm danh mục sản phẩm categories/index
    public function getProductByCateList($idCate,$pageSize = 10,$status = true)
    {
        $pages = $this->dataPagerProduct($idCate,$pageSize);
        $data =  self::find()
        ->select(['id','pro_name','title','slug','price','price_sales','salse','image','product_category_id','short_introduction'])
        // ->joinWith('protype',true)
        ->with([
            'protype' => function($query){
                $query->select(['idtype','pro_id', 'product_type_id']);
                $query->where(['status' => true]);
            }
        ])
        ->where('active=:active',[':active'=>$status])
        ->andWhere(['IN','product_category_id',$idCate]);
        return $data->orderBy(['order' => SORT_ASC, 'created_at' => SORT_DESC, 'updated_at' => SORT_DESC])->offset($pages->offset)
                ->limit($pages->limit)
                ->asArray()
                ->all();
    }

    // Lấy Danh sách tin tức với idCate Truyền vào, loai bo nhung tin tức hot slider (Nhung tin khong nam trong mang $idNew[])
    public function dataPagerProduct($idCate,$pageSize = 10,$status = true)
    {
        $data =  self::find()
        ->select(['id'])
        ->where('active=:active',[':active'=>$status])
        ->andWhere(['IN','product_category_id',$idCate]);

        $pagination  = new Pagination([
            'totalCount' => $data->count(), 'pageSize'=>$pageSize,
             'pageSizeParam' => false, 'forcePageParam' => false,
             // 'route'=>false,
        ]);
        return $pagination;
    }


    public function getProduct($slug)
    {
        $data = self::find()->alias('p')
        ->select(['id','pro_name','p.views','content','p.title','slug','price','price_sales','salse','p.image','product_category_id','p.description','short_introduction'])
        // ->innerJoinWith('imagepro',true)
        ->where('slug=:slug',[':slug'=>$slug])->one();
        return $data;
    }

    // Hàm lấy sản phẩm nổi bật trang chủ/ widget specialOffer
    public function getProductSpecialOffer($limit=9)
    {
        return self::find()
        ->select(['pro_name','title','slug','price','price_sales','image'])
        ->where('active =:status AND hot=:hot',[':status'=>true,':hot'=>true])->orderBy(['order' => SORT_ASC,'created_at' => SORT_DESC])->limit($limit)->asArray()->all();
    }
}
