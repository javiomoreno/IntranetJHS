<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Parametroempresa;

/**
 * ParametroempresaSearch represents the model behind the search form about `app\models\Parametroempresa`.
 */
class ParametroempresaSearch extends Parametroempresa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ParametroID', 'EmpresaID', 'Departamento_DepartamentoID'], 'integer'],
            [['ParametroNombre', 'ParametroValor', 'ParametroFechaReg'], 'safe'],
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
        $query = Parametroempresa::find();

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
            'ParametroFechaReg' => $this->ParametroFechaReg,
            'EmpresaID' => $this->EmpresaID,
            'Departamento_DepartamentoID' => $this->Departamento_DepartamentoID,
        ]);

        $query->andFilterWhere(['like', 'ParametroNombre', $this->ParametroNombre])
            ->andFilterWhere(['like', 'ParametroValor', $this->ParametroValor]);

        return $dataProvider;
    }
}
