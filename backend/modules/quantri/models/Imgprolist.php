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
            [['pro_id', 'image'], 'required'],
            [['pro_id'], 'integer'],
            [['image', 'title', 'alt'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pro_id' => 'Pro ID',
            'image' => 'Image',
            'title' => 'Title',
            'alt' => 'Alt',
        ];
    }
}
