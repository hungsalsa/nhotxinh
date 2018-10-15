<?php

namespace backend\modules\quantri\models;

use Yii;

/**
 * This is the model class for table "tbl_seo_url".
 *
 * @property int $seo_url_id
 * @property int $language_id
 * @property string $title
 * @property string $query
 * @property string $slug
 */
class SeoUrl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_seo_url';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id'], 'integer'],
            [['title', 'query', 'slug'], 'required'],
            [['title', 'query', 'slug'], 'string', 'max' => 255],
            ['slug','checkurl_seo','on' => 'create'],
            ['slug','checkurlUpdate','on' => 'update'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'seo_url_id' => 'Seo Url ID',
            'language_id' => 'Language ID',
            'title' => 'Title',
            'query' => 'Query',
            'slug' => 'Slug',
        ];
    }
    public function checkurl_seo($attribute, $params)
    {
        $slug = $this->getCountSeoUrl($this->$attribute);
        if ($slug) {
            $this->addError($attribute, 'đường dẫn này đã có');
        }
    }
    public function checkurlUpdate($attribute, $params)
    {
        $slug = $this->getCountSeoUrl($this->$attribute);
        if ($slug > 1) {
            $this->addError($attribute, 'đường dẫn này đã có');
        }
    }


    public function getCountSeoUrl($slug)
    {
        return SeoUrl::find()->asArray()->where('slug=:slug',['slug'=>$slug])->all();
    }

    public function getSeoInfo($query)
    {
        return SeoUrl::find()->where('query=:Query',['Query'=>$query])->one();
    }

    public function findModel($id)
    {
        if (($model = SeoUrl::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
