<?php
namespace frontend\models\product;

use Yii;
use yii\helpers\ArrayHelper;

class FProductCategory extends \yii\db\ActiveRecord
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
            [['title', 'cateName', 'active', 'created_at', 'updated_at', 'userCreated', 'userUpdated'], 'required'],
            [['keyword', 'description', 'content', 'short_introduction'], 'string'],
            [['order'], 'number'],
            [['product_parent_id', 'created_at', 'updated_at', 'userCreated', 'userUpdated'], 'integer'],
            [['title', 'cateName', 'slug', 'image'], 'string', 'max' => 255],
            [['home_page', 'active'], 'string', 'max' => 4],
            [['cateName', 'slug'], 'unique', 'targetAttribute' => ['cateName', 'slug']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idCate' => 'Id Cate',
            'title' => 'Title',
            'cateName' => 'Cate Name',
            'slug' => 'Slug',
            'keyword' => 'Keyword',
            'description' => 'Description',
            'content' => 'Content',
            'short_introduction' => 'Short Introduction',
            'home_page' => 'Home Page',
            'image' => 'Image',
            'order' => 'Order',
            'active' => 'Active',
            'product_parent_id' => 'Product Parent ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'userCreated' => 'User Created',
            'userUpdated' => 'User Updated',
        ];
    }

    // Lấy tất cả các con của cateproduct, bao gồm cả nó
    public function getChildCate($idCate)
    {
        $data = self::find()->select('idCate')
        ->where('product_parent_id=:parent AND active =:active',[':parent'=>$idCate,'active'=>true])
        ->asArray()
        ->all();
        $result = [$idCate];
        $result += array_values(ArrayHelper::map($data,'idCate','idCate'));
        // dbg($result);
        return $result;
    }
}
