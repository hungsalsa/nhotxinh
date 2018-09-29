<?php

namespace backend\modules\quantri\models;

use Yii;

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
            [['pro_name', 'description', 'content', 'product_category_id', 'created_at', 'updated_at', 'user_id','price_sales'], 'required','message'=>'{attribute} không được để trống'],
            [['keyword', 'description', 'short_introduction', 'content'], 'string','message'=>'{attribute} nhập vào là ký tự'],
            [['price', 'price_sales', 'order', 'manufacturer_id', 'guarantee', 'views', 'product_category_id', 'created_at', 'updated_at', 'user_id'], 'integer','message'=>'{attribute} không phải là số'],
            [['start_sale', 'end_sale'], 'safe'],
            [['pro_name', 'title', 'slug', 'code', 'image', 'images_list', 'tags', 'related_articles'], 'string', 'max' => 255,'message'=>'{attribute} không phải là ký tự'],
            [['active'], 'string', 'max' => 4 ,'message'=>'{attribute} phải là ký tự max 4 ký tự'],
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
            'slug' => 'đường dẫn',
            'keyword' => 'Từ khóa',
            'description' => 'Description',
            'short_introduction' => 'Giới thiệu ngắn',
            'content' => 'Chi tiết',
            'price' => 'Giá sp',
            'start_sale' => 'Ngày đầu giảm',
            'end_sale' => 'Ngày cuối giảm',
            'price_sales' => 'Giá bán',
            'order' => 'Thứ tự',
            'active' => 'Kích hoạt',
            'product_type_id' => 'Loại sản phẩm',
            'salse' => 'Giảm giá',
            'hot' => 'Sản phẩm hot',
            'best_seller' => 'SP bán chạy',
            'new' => 'SP mới',
            'manufacturer_id' => 'Nhà sản xuất',
            'guarantee' => 'Bảo hành',
            'models_id' => 'Lăp cho xe',
            'views' => 'lượt xem',
            'code' => 'Mã sản phẩm',
            'image' => 'Ảnh',
            'images_list' => 'Danh sách ảnh',
            'tags' => 'Tags',
            'product_category_id' => 'Danh mục SP',
            'related_articles' => 'Bài viết liên quan',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày sửa',
            'user_id' => 'Người dùng',
        ];
    }
}
