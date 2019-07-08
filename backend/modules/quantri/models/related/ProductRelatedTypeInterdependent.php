<?php

namespace backend\modules\quantri\models\related;

use Yii;
use yii\helpers\ArrayHelper;
class ProductRelatedTypeInterdependent extends \yii\db\ActiveRecord
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
            [['status'], 'number', 'max' => 4],
            [['pro_id', 'product_type_id'], 'unique', 'targetAttribute' => ['pro_id', 'product_type_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtype' => 'idtype',
            'pro_id' => 'Pro ID',
            'product_type_id' => 'Product Type ID',
            'status' => 'Status',
        ];
    }

    public function getProductType($pro_id,$productType)
    {
        return self::find()->where(['pro_id'=>$pro_id])->andWhere(['IN','product_type_id',$productType])->all();
    }
    public function getProductTypeTrue($pro_id,$status=true)
    {
        return array_values(ArrayHelper::map(self::find()->where('pro_id=:pro_id AND status=:status',[':pro_id'=>$pro_id,':status'=>$status])->all(),'idtype','product_type_id'));
    }
}
