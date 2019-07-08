<?php

namespace frontend\models\setting;

use Yii;
use frontend\models\product\FProductCategory;

/**
 * This is the model class for table "tbl_menus".
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $slug
 * @property int $type Kiểu của menu: sản phẩm, hay tin tức
 * @property string $introduction
 * @property int $parent_id
 * @property int $link_cate Liên kết đến dm sp, hay dm bài viết
 * @property int $order
 * @property string $image
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $user_id
 */
class FMenus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_menus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'type', 'status', 'created_at', 'updated_at', 'user_id'], 'required'],
            [['type', 'parent_id', 'link_cate', 'order', 'created_at', 'updated_at', 'user_id'], 'integer'],
            [['introduction'], 'string'],
            [['name', 'title', 'slug', 'image'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 4],
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
            'name' => 'Name',
            'title' => 'Title',
            'slug' => 'Slug',
            'type' => 'Type',
            'introduction' => 'Introduction',
            'parent_id' => 'Parent ID',
            'link_cate' => 'Link Cate',
            'order' => 'Order',
            'image' => 'Image',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(FProductCategory::className(),['idCate'=>'link_cate']);
    }
    public function getParent()
    {
        return $this->hasMany(self::className(),['id'=>'parent_id']);
    }

    public function getAllMenu($parent=0,$status = true)
    {
        $data = self::find()->alias('m')
        ->select(['m.id','m.name','m.type','m.link_cate','m.image','ca.cateName','ca.slug','m.parent_id'])
            // ->joinWith(['category ca',true])
        ->innerJoinWith('category ca',false)
        ->where('m.status=:active AND m.parent_id=:parent',[':active'=>$status,':parent'=>$parent])->orderBy(['m.order' => SORT_ASC,'m.created_at' => SORT_DESC])
        ->asArray()
        ->all();
        $result = $data;
        foreach ($data as $key => $value) {
            $result[$key]['child'] = self::getAllMenu($value['id']);
        }
        return $result;
    }

}
