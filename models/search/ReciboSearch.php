<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Recibo;

/**
 * ReciboSearch represents the model behind the search form about `app\models\Recibo`.
 */
class ReciboSearch extends Recibo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ReciboID', 'ReciboNumero', 'UsuarioID'], 'integer'],
            [['ReciboFechaInicio', 'ReciboFechaFin', 'Recibocol'], 'safe'],
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
        $query = Recibo::find();

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
            'ReciboID' => $this->ReciboID,
            'ReciboFechaInicio' => $this->ReciboFechaInicio,
            'ReciboFechaFin' => $this->ReciboFechaFin,
            'ReciboNumero' => $this->ReciboNumero,
            'UsuarioID' => $this->UsuarioID,
        ]);

        $query->andFilterWhere(['like', 'Recibocol', $this->Recibocol]);

        return $dataProvider;
    }
}
