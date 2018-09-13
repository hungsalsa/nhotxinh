<?php

namespace backend\modules\quantri\models;

use Yii;

/**
 * This is the model class for table "tbl_manufactures".
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $slug
 * @property string $image
 * @property int $active
 * @property int $order
 * @property string $content
 * @property string $description
 * @property string $keyword
 * @property int $parent_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $user_id
 */
class Manufactures extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_manufactures';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'title', 'slug', 'active', 'description', 'created_at', 'updated_at', 'user_id'], 'required'],
            [['order', 'parent_id', 'created_at', 'updated_at', 'user_id'], 'integer'],
            [['content', 'description', 'keyword'], 'string'],
            [['name', 'title', 'slug', 'image'], 'string', 'max' => 255],
            [['active'], 'string', 'max' => 4],
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
            'title' => 'Title',
            'slug' => 'Slug',
            'image' => 'Image',
            'active' => 'Active',
            'order' => 'Order',
            'content' => 'Content',
            'description' => 'Description',
            'keyword' => 'Keyword',
            'parent_id' => 'Parent ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'User ID',
        ];
    }
}
