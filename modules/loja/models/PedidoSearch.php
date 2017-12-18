<?php

namespace app\modules\loja\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\loja\models\Pedido;

/**
 * PedidoSearch represents the model behind the search form about `app\modules\loja\models\Pedido`.
 */
class PedidoSearch extends Pedido
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [ [ 'pedido_id', 'quantidade', 'oferta_id', 'consumidor_id', 'status_id' ], 'integer' ],
            [ [ 'momento' ], 'safe' ],
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
    public function search( $params )
    {
        $query = Pedido::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if ( ! $this->validate() )
        {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'pedido_id' => $this->pedido_id,
            'momento' => $this->momento,
            'quantidade' => $this->quantidade,
            'oferta_id' => $this->oferta_id,
            'consumidor_id' => $this->consumidor_id
        ]);

        return $dataProvider;

    }

    public static function searchByStatusAndOffers( $status_id, $ofertas )
    {
        $query = Pedido::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->where([
            'status_id' => $status_id,
            'oferta_id' => $ofertas
        ]);

        $query->orderBy("momento DESC");

        return $dataProvider;

    }

}
