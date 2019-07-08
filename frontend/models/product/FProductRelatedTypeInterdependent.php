<?php

namespace frontend\models\product;

use Yii;

/**
 * This is the model class for table "tbl_product_related_type_interdependent".
 *
 * @property int $idtype
 * @property int $pro_id
 * @property int $product_type_id Các Id bài viết liên quan
 * @property int $status
 */
class FProductRelatedTypeInterdependent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_product_related_type_interdependent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pro_id', 'product_type_id', 'status'], 'required'],
            [['pro_id', 'product_type_id'], 'integer'],
            [['status'], 'string', 'max' => 4],
            [['pro_id', 'product_type_id'], 'unique', 'targetAttribute' => ['pro_id', 'product_type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtype' => 'Idtype',
            'pro_id' => 'Pro ID',
            'product_type_id' => 'Product Type ID',
            'status' => 'Status',
        ];
    }
}
