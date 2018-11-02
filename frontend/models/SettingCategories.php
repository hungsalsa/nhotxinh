<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_setting_categories".
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property int $link_cate
 * @property string $slug_cate
 * @property string $title
 * @property string $description
 * @property int $order
 * @property string $icon
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $user_add
 */
class SettingCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_setting_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'link_cate', 'slug_cate', 'status', 'created_at', 'updated_at', 'user_add'], 'required'],
            [['parent_id', 'link_cate', 'order', 'created_at', 'updated_at', 'user_add'], 'integer'],
            [['description'], 'string'],
            [['name', 'slug_cate', 'title', 'icon'], 'string', 'max' => 255],
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
            'slug_cate' => 'Slug Cate',
            'title' => 'Title',
            'description' => 'Description',
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
        return SettingCategories::find()->select(['id','name', 'parent_id','link_cate','slug_cate','order','icon'])->asArray()->where('status =:Active AND parent_id =:parent',['Active' =>1,'parent'=>$parent])->orderBy(['order'=>SORT_ASC])->all();
    }

    public function getCateId_Categories($slug,$status=1)
    {
        return $data = Menus::find()->select('link_cate')->where('slug =:ID AND status =:Status AND type =:Type',['ID'=>$slug,'Status'=>$status, 'Type'=>1])->one();
        // return $data->link_cate;
    }

    public function getCateId_CateSlug($slug,$status=1)
    {
         $data = SettingCategories::find()->select('link_cate')->where('slug_cate =:slug AND status =:Status',['slug'=>$slug,'Status'=>$status])->one();
        return $data->link_cate;
    }

}
