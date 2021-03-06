<?php

namespace backend\modules\quantri\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\quantri\models\Product;

/**
 * ProductSearch represents the model behind the search form of `backend\modules\quantri\models\Product`.
 */
class ProductSearch extends Product
{
    // public $cateName;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'price', 'price_sales', 'order', 'guarantee', 'views', 'created_at', 'updated_at', 'userCreated'], 'integer'],
            [['pro_name', 'title', 'slug', 'keyword', 'description', 'short_introduction', 'content', 'start_sale', 'end_sale', 'active', 'product_type_id', 'salse', 'hot', 'best_seller', 'models_id', 'code', 'image', 'images_list', 'tags', 'related_articles', 'related_products', 'product_category_id', 'manufacturer_id',], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Product::find()->from('tbl_product p');
    // $query->with("Productcategory"); // eager load to reduce number of queries

        
        // add conditions that should always apply here
        

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        // $dataProvider->sort->attributes['cateName'] = [
        //     'asc' =>['cateName' => SORT_ASC],
        //     'desc' => ['cateName' => SORT_DESC]
        // ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith("productCategory cate");
        $query->joinWith("manufactures manufactures");

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'price' => $this->price,
            'price_sales' => $this->price_sales,
            'start_sale' => $this->start_sale,
            'end_sale' => $this->end_sale,
            'order' => $this->order,
            // 'manufacturer_id' => $this->manufacturer_id,
            'guarantee' => $this->guarantee,
            'views' => $this->views,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'userCreated' => $this->userCreated,
        ]);

        $query->andFilterWhere(['like', 'pro_name', $this->pro_name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'short_introduction', $this->short_introduction])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'p.active', $this->active])
            ->andFilterWhere(['like', 'product_type_id', $this->product_type_id])
            ->andFilterWhere(['like', 'salse', $this->salse])
            ->andFilterWhere(['like', 'hot', $this->hot])
            ->andFilterWhere(['like', 'best_seller', $this->best_seller])
            ->andFilterWhere(['like', 'models_id', $this->models_id])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'images_list', $this->images_list])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'related_articles', $this->related_articles])
            ->andFilterWhere(['like', 'related_products', $this->related_products])
            ->andFilterWhere(['like', 'cate.cateName', $this->product_category_id])
            ->andFilterWhere(['like', 'manufactures.ManName', $this->manufacturer_id]);

        return $dataProvider;
    }
}
