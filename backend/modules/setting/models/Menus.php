<?php

namespace backend\modules\setting\models;

use Yii;
use backend\modules\quantri\models\Productcategory;
/**
 * This is the model class for table "tbl_menus".
 *
 * @property int $id
 * @property string $name
 * @property int $type Kiểu của menu: sản phẩm, hay tin tức
 * @property string $introduction
 * @property int $parent_id
 * @property int $link_cate Liên kết đến dm sp, hay dm bài viết
 * @property int $order
 * @property string $image
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $userCreated
 */
class Menus extends \yii\db\ActiveRecord
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
            [['name', 'slug', 'type', 'status', 'created_at', 'updated_at', 'userCreated'], 'required'],
            [['type', 'parent_id', 'link_cate', 'order', 'created_at', 'updated_at', 'userCreated','status','userUpdated'], 'integer'],
            [['introduction'], 'string'],
            [['name', 'title', 'slug', 'image'], 'string', 'max' => 255],
            // [['status'], 'string', 'max' => 4],
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
            'name' => 'Tên hiển thị',
            'title' => 'Tiêu đề',
            'slug' => 'Đường dẫn',
            'type' => 'Loại',
            'introduction' => 'Introduction',
            'parent_id' => 'Menu cha',
            'link_cate' => 'Liên kết danh mục',
            'order' => 'Sắp xếp',
            'image' => 'Ảnh',
            'status' => 'Kích hoạt',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày sửa',
            'userCreated' => 'Người tạo',
            'userUpdated' => 'Người sửa',
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Productcategory::className(),['idCate'=>'link_cate']);
    }

    public $data;
    public function getMenuParent($parent = 0,$level = '')
    {
        $result = Menus::find()->asArray()->where('status =:Active AND parent_id =:parent',['Active'=>1,'parent'=>$parent])->all();
        $level .='--| ';
        foreach ($result as $key=>$value) {
            if($parent == 0){
                $level='';
            }
            $this->data[$value['id']] = $level.$value['name'];
            self::getMenuParent($value['id'],$level);
        }
        return $this->data;
    }
}
