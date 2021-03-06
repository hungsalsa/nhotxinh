<?php

namespace frontend\models\product;

use Yii;

/**
 * This is the model class for table "tbl_imgpro_list".
 *
 * @property int $idIma
 * @property int $pro_id
 * @property string $image
 * @property string $title
 * @property string $alt
 * @property int $status
 */
class FImgproList extends \yii\db\ActiveRecord
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
            [['status'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idIma' => 'Id Ima',
            'pro_id' => 'Pro ID',
            'image' => 'Image',
            'title' => 'Title',
            'alt' => 'Alt',
            'status' => 'Status',
        ];
    }
}
