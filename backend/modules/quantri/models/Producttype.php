<?php

namespace backend\modules\quantri\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "tbl_product_type".
 *
 * @property int $id
 * @property string $typeName
 * @property int $status
 */
class Producttype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_product_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'required'],
            [['typeName'], 'string', 'max' => 255],
            [['status'], 'number', 'max' => 2],
            [['typeName'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'typeName' => 'Type Name',
            'status' => 'Status',
        ];
    }

    public function getAllProductType()
    {
        return ArrayHelper::map(Producttype::find()->where('status =:status',['status'=>'1']) ->orderBy(['typeName' => SORT_ASC, ])->all(),'id','typeName'); 
    }
}
