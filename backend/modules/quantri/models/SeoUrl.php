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
            [['slug'], 'required','message'=>'{attribute} không được để trống'],
            [['query', 'slug'], 'string', 'max' => 255],
            // [['slug'], 'unique','message'=>'{attribute} này đã có xin chọn đường dẫn khác'],
            // Phải kiểm tra 2 trường giống nhau thì báo lỗi
            [['slug'], 'unique','message'=>'{attribute} này đã có xin chọn đường dẫn khác'],
            // [['slug', 'query'], 'unique', 'targetAttribute' => ['slug', 'query'],'message'=>'{attribute} này đã có xin chọn đường dẫn khác'],
            
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
            'query' => 'Query',
            'slug' => 'Đường dẫn',
        ];
    }

    public function getSeoID($slug)
    {
        return SeoUrl::find()->select('seo_url_id')->where('slug =:Slug',['Slug'=>$slug])->one();
    }

    // Hàm trả về slug cho sidebar category setting

    public function getSlugSeo($query)
    {
        $data =  SeoUrl::find()->select('slug')->where('query =:Slug',['Slug'=>$query])->one();
        return $data->slug;
    }
}