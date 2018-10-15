<?php

namespace backend\modules\quantri\models;

use Yii;
use yii\helpers\ArrayHelper;
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
            [['name', 'link', 'category_id', 'content', 'status', 'user_add', 'created_at', 'updated_at'], 'required'],
            [['category_id', 'view', 'sort', 'user_add', 'created_at', 'updated_at'], 'integer'],
            [['htmldescriptions', 'short_description', 'content'], 'string'],
            [['name', 'link', 'images', 'image_detail', 'htmltitle', 'htmlkeyword'], 'string', 'max' => 255],
            [['hot'], 'string', 'max' => 11],
            [['status'], 'string', 'max' => 4],
            [['link'], 'unique'],
            [['name'], 'unique'],
            // , 'related_products', 'related_news'
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
            'image_detail' => 'Image Detail',
            'category_id' => 'Category ID',
            'htmltitle' => 'Htmltitle',
            'htmlkeyword' => 'Htmlkeyword',
            'htmldescriptions' => 'Htmldescriptions',
            'short_description' => 'Short Description',
            'content' => 'Content',
            'hot' => 'Hot',
            'view' => 'View',
            'related_products' => 'Related Products',
            'related_news' => 'Related News',
            'sort' => 'Sort',
            'status' => 'Status',
            'user_add' => 'User Add',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getAllNews()
    {
        return ArrayHelper::map(News::find()->asArray()->where('status =:Status',['Status'=>1])->orderBy(['name' => SORT_ASC, ])->all(),'id','name');
    }

    public function getCategories()
    {
        return $this->hasOne(Categories::className(),['id'=>'category_id']);
    }

    public function getCatename()
    {
        return $this->categories->cateName;
    }
}