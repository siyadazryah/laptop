<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Products;

/**
 * ProductsSearch represents the model behind the search form of `common\models\Products`.
 */
class ProductsSearch extends Products {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['id', 'brand', 'processor_type', 'touch_screen', 'availability', 'CB', 'UB'], 'integer'],
                [['name', 'canonical_name', 'image', 'DOC', 'DOU'], 'safe'],
                [['price', 'screen'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Products::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'price' => $this->price,
            'brand' => $this->brand,
            'processor_type' => $this->processor_type,
            'screen' => $this->screen,
            'touch_screen' => $this->touch_screen,
            'availability' => $this->availability,
            'CB' => $this->CB,
            'UB' => $this->UB,
            'DOC' => $this->DOC,
            'DOU' => $this->DOU,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'canonical_name', $this->canonical_name])
                ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }

}
