<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Objects;

/**
 * ObjectsSearch represents the model behind the search form about `common\models\Objects`.
 */
class ObjectsSearch extends Objects
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category', 'power', 'size', 'gear', 'weight', 'price_usd', 'price_uah'], 'integer'],
            [['title', 'url', 'seoTitle', 'seoKeywords', 'seoDescription', 'class', 'fuel', 'reducer', 'equipment', 'presence'], 'safe'],
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
        $query = Objects::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'category' => $this->category,
            'power' => $this->power,
            'size' => $this->size,
            'gear' => $this->gear,
            'weight' => $this->weight,
            'price_usd' => $this->price_usd,
            'price_uah' => $this->price_uah,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'seoTitle', $this->seoTitle])
            ->andFilterWhere(['like', 'seoKeywords', $this->seoKeywords])
            ->andFilterWhere(['like', 'seoDescription', $this->seoDescription])
            ->andFilterWhere(['like', 'class', $this->class])
            ->andFilterWhere(['like', 'fuel', $this->fuel])
            ->andFilterWhere(['like', 'reducer', $this->reducer])
            ->andFilterWhere(['like', 'equipment', $this->equipment])
            ->andFilterWhere(['like', 'presence', $this->presence]);

        return $dataProvider;
    }
}
