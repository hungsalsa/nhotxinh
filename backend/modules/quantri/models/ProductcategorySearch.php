<?php

namespace backend\modules\quantri\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\quantri\models\Productcategory;

/**
 * ProductcategorySearch represents the model behind the search form of `backend\modules\quantri\models\Productcategory`.
 */
class ProductcategorySearch extends Productcategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCate', 'order', 'product_parent_id', 'created_at', 'updated_at', 'user_id'], 'integer'],
            [['title', 'cateName', 'slug', 'keyword', 'description', 'content', 'short_introduction', 'home_page', 'image', 'active'], 'safe'],
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
        $query = Productcategory::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idCate' => $this->idCate,
            'order' => $this->order,
            'product_parent_id' => $this->product_parent_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'cateName', $this->cateName])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'keyword', $this->keyword])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'short_introduction', $this->short_introduction])
            ->andFilterWhere(['like', 'home_page', $this->home_page])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'active', $this->active]);

        return $dataProvider;
    }
}
