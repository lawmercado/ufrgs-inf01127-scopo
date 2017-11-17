<?php

namespace app\modules\loja\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\loja\models\Oferta;

/**
 * OfertaSearch represents the model behind the search form about `app\modules\loja\models\Oferta`.
 */
class OfertaSearch extends Oferta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['oferta_id', 'quantidade', 'corrente', 'produto_id', 'produtor_id'], 'integer'],
            [['momento'], 'safe'],
            [['preco_unidade'], 'number'],
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
        $query = Oferta::find();

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
            'oferta_id' => $this->oferta_id,
            'momento' => $this->momento,
            'quantidade' => $this->quantidade,
            'preco_unidade' => $this->preco_unidade,
            'corrente' => $this->corrente,
            'produto_id' => $this->produto_id,
            'produtor_id' => $this->produtor_id,
        ]);

        return $dataProvider;
    }
}
