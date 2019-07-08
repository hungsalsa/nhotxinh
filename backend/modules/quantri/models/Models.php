<?php

namespace backend\modules\quantri\models;

use Yii;

/**
 * This is the model class for table "tbl_models".
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property int $active
 * @property int $order
 */
class Models extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_models';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'active', 'created_at', 'updated_at', 'userCreated', 'userUpdated'], 'required'],
            [['parent_id', 'order', 'created_at', 'updated_at', 'userCreated', 'userUpdated'], 'integer'],
            [['name'], 'string', 'max' => 255],
            // [['active'], 'string', 'max' => 4],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên xe',
            'parent_id' => 'Parent ID',
            'active' => 'Kích hoạt',
            'order' => 'Sắp xếp',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày chỉnh sửa',
            'userCreated' => 'Người tạo',
            'userUpdated' => 'Người sửa',
        ];
    }

    public $data;
    public function getModelsParent($parent = 0,$level = '')
    {
        
        $result = Models::find()->asArray()->where('parent_id =:parent and active =:Active',['parent'=>$parent,'Active'=>1])->all();
        $level .='--| ';
        foreach ($result as $key=>$value) {
            if($parent == 0){
                $level='';
            }
            $this->data[$value['id']] = $level.$value['name'];
            self::getModelsParent($value['id'],$level);
        }

        return $this->data;
    }
}
