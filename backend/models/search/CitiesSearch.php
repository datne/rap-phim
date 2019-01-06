<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\City;

/**
 * CitiesSearch represents the model behind the search form of `common\models\City`.
 */
class CitiesSearch extends City
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'isDeleted', 'deletedUserId', 'deletedTime'], 'integer'],
            [['cityname'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = City::find();

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
        
        $query->where(['isDeleted' => false]);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isDeleted' => $this->isDeleted,
            'deletedUserId' => $this->deletedUserId,
            'deletedTime' => $this->deletedTime,
        ]);

        $query->andFilterWhere(['like', 'cityname', $this->cityname]);

        return $dataProvider;
    }
}
