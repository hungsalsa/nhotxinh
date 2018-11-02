<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_news".
 *
 * @property int $id
 * @property string $name
 * @property string $link
 * @property string $images
 * @property int $category_id
 * @property string $htmltitle
 * @property string $htmlkeyword
 * @property string $htmldescriptions
 * @property string $content
 * @property int $hot
 * @property int $view
 * @property string $tag
 * @property int $sort
 * @property int $status
 * @property int $user_add
 * @property string $created_at
 * @property string $updated_at
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'category_id', 'content', 'status', 'user_add', 'created_at', 'updated_at'], 'required'],
            [['category_id', 'view', 'sort', 'user_add', 'created_at', 'updated_at'], 'integer'],
            [['htmldescriptions', 'short_description', 'content'], 'string'],
            [['name', 'link', 'images', 'htmltitle', 'htmlkeyword', 'tag'], 'string', 'max' => 255],
            [['hot'], 'string', 'max' => 11],
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
            'link' => 'Link',
            'images' => 'Images',
            'category_id' => 'Category ID',
            'htmltitle' => 'Htmltitle',
            'htmlkeyword' => 'Htmlkeyword',
            'htmldescriptions' => 'Htmldescriptions',
            'short_description' => 'Short Description',
            'content' => 'Content',
            'hot' => 'Hot',
            'view' => 'View',
            'tag' => 'Tag',
            'sort' => 'Sort',
            'status' => 'Status',
            'user_add' => 'User Add',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getNewByCate($idCate)
    {
        return News::find()->select(['name','link','images','short_description'])->asArray()->where('category_id =:cate AND status =:Status',['cate'=>$idCate,'Status'=>1])->all();
    }

    public function getAllBlog($status = 1)
    {
        return News::find()->asArray()->where('status =:Status',['Status'=>$status])->all();
    }

    public function getNewsHome($status = 1,$limit = 10)
    {
        return News::find()->select(['id','name','images','short_description','link'])->asArray()->where('status =:Status',['Status'=>$status])->limit($limit)->all();
    }

    public function NewInfo($slug,$status = 1)
    {
        return News::find()->asArray()->where('link =:slug AND status =:Status',['slug'=>$slug,'Status'=>$status])->one();
    }

    public function getProductNew($slug,$status = 1)
    {
        return News::find()->select(['related_products','related_news','updated_at','user_add'])->asArray()->where('link =:slug AND status =:Status',['slug'=>$slug,'Status'=>$status])->one();
    }

    // Hamf trả về danh sách cùng cha với danh sách mảng $parent_id = Array()
    public function getAllNewCateArray($category_id)
    {

        // ->where(['in', 'product_id', $ids])
        return $result = (new \yii\db\Query)
                ->select(['name','link','images','short_description','user_add','updated_at'])
                ->from('tbl_news n')
                ->where(['n.category_id' => $category_id])
                ->andWhere(['status' => 1])
                ->all();
    }
}
