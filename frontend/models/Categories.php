<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_categories".
 *
 * @property int $id
 * @property string $cateName
 * @property int $groupId
 * @property int $parent_id
 * @property string $link
 * @property string $images
 * @property int $sort
 * @property string $title
 * @property string $keyword
 * @property string $descriptions
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $userAdd
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cateName', 'groupId', 'status', 'created_at', 'updated_at', 'userAdd'], 'required'],
            [['groupId', 'parent_id', 'sort', 'created_at', 'updated_at', 'userAdd'], 'integer'],
            [['descriptions'], 'string'],
            [['cateName', 'link', 'images', 'title', 'keyword'], 'string', 'max' => 255],
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
            'cateName' => 'Cate Name',
            'groupId' => 'Group ID',
            'parent_id' => 'Parent ID',
            'link' => 'Link',
            'images' => 'Images',
            'sort' => 'Sort',
            'title' => 'Title',
            'keyword' => 'Keyword',
            'descriptions' => 'Descriptions',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'userAdd' => 'User Add',
        ];
    }

    public function getSlugById($id)
    {
        $data = Categories::find()->select(['link'])->asArray()->where('status =:status AND id =:ID',['status'=>1,'ID'=>$id])->one();
        return $data['link'];
        unset($data);
    }
    
    public function getIdBySlug($slug)
    {
        $data = Categories::find()->select(['id'])->asArray()->where('status =:status AND link =:slug',['status'=>1,'slug'=>$slug])->one();
        return $data['id'];
        unset($data);
    }

    // Hàm trả về Id khi biết parent
    public function getListId($parent_id)
    {
        $data =  Categories::find()->select('id')->where('status =:status AND parent_id =:parent',['status'=>1,'parent'=>$parent_id])->all();
        $id=array();
        foreach ($data as $value) {
            $id[$value->id] = $value->id;
        }
        return $id;
    }

    // Trả về tất cả danh sách có cùng cha
    
}
