<?php

namespace backend\modules\quantri\models;

use Yii;

/**
 * This is the model class for table "tbl_manufactures".
 *
 * @property int $idMan
 * @property string $ManName
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
 * @property int $userCreated
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
            [['ManName', 'title', 'slug', 'active', 'description', 'created_at', 'updated_at', 'userCreated'], 'required'],
            [['order', 'parent_id', 'created_at', 'updated_at', 'userCreated','userUpdated'], 'integer'],
            [['content', 'description', 'keyword'], 'string'],
            [['ManName', 'title', 'slug', 'image'], 'string', 'max' => 255],
            // [['active'], 'string', 'max' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idMan' => 'Id Man',
            'ManName' => 'Man Name',
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
            'userCreated' => 'User ID',
            'userUpdated' => 'userUpdated ID',
        ];
    }

    public $data;
    public function getManufacturesParent($parent = 0,$level = '')
    {
        $result = Manufactures::find()->asArray()->where('parent_id =:parent AND active =:activ',['parent'=>$parent,'activ'=>1])->all();
        $level .='--| ';
        foreach ($result as $key=>$value) {
            if($parent == 0){
                $level='';
            }
            $this->data[$value['idMan']] = $level.$value['ManName'];
            self::getManufacturesParent($value['idMan'],$level);
        }

        return $this->data;
    }
}
