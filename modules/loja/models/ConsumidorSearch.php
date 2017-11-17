<?php

namespace app\modules\loja\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\loja\models\Consumidor;

/**
 * ConsumidorSearch represents the model behind the search form about `app\modules\loja\models\Consumidor`.
 */
class ConsumidorSearch extends Consumidor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['consumidor_id', 'pessoa_id'], 'integer'],
            [['cpf'], 'safe'],
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
        $query = Consumidor::find();

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
            'consumidor_id' => $this->consumidor_id,
            'pessoa_id' => $this->pessoa_id,
        ]);

        $query->andFilterWhere(['like', 'cpf', $this->cpf]);

        return $dataProvider;
    }
}
