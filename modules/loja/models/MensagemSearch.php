<?php

namespace app\modules\loja\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\loja\models\Mensagem;

/**
 * MensagemSearch represents the model behind the search form about `app\modules\loja\models\Mensagem`.
 */
class MensagemSearch extends Mensagem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mensagem_id', 'pedido_id', 'pessoa_id'], 'integer'],
            [['momento', 'mensagem'], 'safe'],
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
        $query = Mensagem::find();

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
            'mensagem_id' => $this->mensagem_id,
            'momento' => $this->momento,
            'pedido_id' => $this->pedido_id,
            'pessoa_id' => $this->pessoa_id,
        ]);

        $query->andFilterWhere(['like', 'mensagem', $this->mensagem]);

        return $dataProvider;
    }
}
