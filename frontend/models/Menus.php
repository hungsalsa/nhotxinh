<?php

namespace frontend\models;

use Yii;
use frontend\models\Productcategory;
use frontend\models\Categories;
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
 * @property int $user_id
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
            [['name', 'type', 'status', 'created_at', 'updated_at', 'user_id'], 'required'],
            [['type', 'parent_id', 'link_cate', 'order', 'created_at', 'updated_at', 'user_id'], 'integer'],
            [['introduction'], 'string'],
            [['name', 'image'], 'string', 'max' => 255],
            [['status'], 'string', 'max' => 4],
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

    public function getMenusByParent($parent = 0,$status = 1)
    {
        return Menus::find()->asArray()->where('parent_id =:parent AND status =:Status',['parent'=>$parent,'Status'=>$status])->orderBy(['order' => SORT_ASC]) ->all();
    }


    public function getLinkType($type,$idCate)
    {
        $catePro = new Productcategory();
        $cateNew = new Categories();

        switch ($type) {
            case 1:
                $link = 'danh-sach/'.$catePro->getSlugById($idCate);
                break;
            case 2:
                $link = 'tin-tuc/'.$cateNew->getSlugById($idCate);
                break;
            
            default:
                $link = 'pages/';
                break;
        }
        return $link;
    }

    // Hàm trả về ID trên menu
    public function getIdByslug($lug,$status=1)
    {
        $data = Menus::find()->select('id')->where('slug =:Slug AND status =:Status',['Slug'=>$lug,'Status'=>$status])->one();
        return $data->id;
    }

    // Hàm trả về link_cate liên kết đếm danh mục sp hay tin tức
    public function getMenuInfo($slug,$status=1)
    {
        return Menus::find()->select('type, link_cate')->where('slug =:ID AND status =:Status',['ID'=>$slug,'Status'=>$status])->one();
    }

    public function getMenuInfoProduct($slug,$status=1)
    {
        $data = Menus::find()->select('link_cate')->asArray()->where('slug =:ID AND status =:Status AND type =:Type',['ID'=>$slug,'Status'=>$status, 'Type'=>1])->one();
        if (empty($data)) {
            return false;
        } else {
            return $data['link_cate'];
        }
    }
}
