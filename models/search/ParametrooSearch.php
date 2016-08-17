<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Parametro;

/**
 * ParametrooSearch represents the model behind the search form about `app\models\Parametro`.
 */
class ParametrooSearch extends Parametro
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ParametroID', 'ReciboID'], 'integer'],
            [['ParametroCodigo', 'ParametroDescripcion', 'ParametroValorAuxiliar', 'ParametroFechaReg'], 'safe'],
            [['ParametroAsignaciones', 'ParametroDeducciones', 'ParametroNetoaCobrar'], 'number'],
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
        $query = Parametro::find();

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
            'ParametroID' => $this->ParametroID,
            'ParametroAsignaciones' => $this->ParametroAsignaciones,
            'ParametroDeducciones' => $this->ParametroDeducciones,
            'ParametroNetoaCobrar' => $this->ParametroNetoaCobrar,
            'ParametroFechaReg' => $this->ParametroFechaReg,
            'ReciboID' => $this->ReciboID,
        ]);

        $query->andFilterWhere(['like', 'ParametroCodigo', $this->ParametroCodigo])
            ->andFilterWhere(['like', 'ParametroDescripcion', $this->ParametroDescripcion])
            ->andFilterWhere(['like', 'ParametroValorAuxiliar', $this->ParametroValorAuxiliar]);

        return $dataProvider;
    }
}
