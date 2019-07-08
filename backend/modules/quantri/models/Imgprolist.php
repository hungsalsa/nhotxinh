<?php

namespace backend\modules\quantri\models;

use Yii;

/**
 * This is the model class for table "tbl_imgpro_list".
 *
 * @property int $id
 * @property int $pro_id
 * @property string $image
 * @property string $title
 * @property string $alt
 * @property int $status
 */
class Imgprolist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_imgpro_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pro_id', 'image', 'status'], 'required'],
            [['pro_id'], 'integer'],
            [['image', 'title', 'alt'], 'string', 'max' => 255],
            [['status'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idIma' => 'ID',
            'pro_id' => 'Sản phẩm',
            'image' => 'Ảnh',
            'title' => 'Title',
            'alt' => 'Seo Alt',
            'status' => 'Status',
        ];
    }
}
