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
            [['name', 'active'], 'required'],
            [['parent_id', 'order'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'name' => 'Các dòng xe',
            'parent_id' => 'Parent ID',
            'active' => 'Active',
            'order' => 'Order',
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
