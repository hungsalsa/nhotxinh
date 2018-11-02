<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_setting_category".
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property int $link_cate
 * @property int $order
 * @property string $icon
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $user_add
 */
class SettingCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_setting_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status', 'created_at', 'updated_at', 'user_add'], 'required'],
            [['parent_id', 'link_cate', 'order', 'created_at', 'updated_at', 'user_add'], 'integer'],
            [['name', 'icon'], 'string', 'max' => 255],
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
            'parent_id' => 'Parent ID',
            'link_cate' => 'Link Cate',
            'order' => 'Order',
            'icon' => 'Icon',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_add' => 'User Add',
        ];
    }

    
    public function getAllCat($parent = 0,$status = 1)
    {
        return SettingCategory::find()->select(['id','name', 'parent_id','link_cate','slug','order','icon'])->asArray()->where('status =:Active AND parent_id =:parent',['Active' =>1,'parent'=>$parent])->orderBy(['order'=>SORT_ASC])->all();
    }
}
