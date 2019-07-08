<?php

namespace backend\modules\setting\models;

use Yii;

/**
 * This is the model class for table "tbl_banner".
 *
 * @property int $id
 * @property string $image
 * @property string $url
 * @property string $alt
 * @property int $order
 * @property string $content
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $userCreated
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_banner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[/*'image', */'status', 'created_at', 'updated_at', 'userCreated', 'userUpdated'], 'required'],
            [['created_at', 'updated_at', 'userCreated', 'userUpdated'], 'integer'],
            [['content'], 'string'],
            [['order'], 'number'],
            [['name', 'image', 'url', 'alt'], 'string', 'max' => 255],
            // [['status'], 'string', 'max' => 4],
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
            'image' => 'Ảnh',
            'url' => 'Liên kết',
            'alt' => 'Seo Alt Banner',
            'order' => 'Sắp xếp',
            'content' => 'Content',
            'status' => 'Kích hoạt',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày sửa',
            'userCreated' => 'Người sửa',
            'userUpdated' => 'Người sửa',
        ];
    }


    public function checkBannerImage($id,$image)
    {
        return self::find()->where(['image'=>$image])
        ->andWhere(['!=','id',$id])
        ->count();
    }
}
