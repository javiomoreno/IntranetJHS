<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * UsuarioSearch represents the model behind the search form about `app\models\Usuario`.
 */
class UsuarioSearch extends Usuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UsuarioID', 'RolID', 'EmpresaID', 'CargoID'], 'integer'],
            [['UsuarioNombre', 'UsuarioApellido', 'UsuarrioCedula', 'UsuarioCorreo', 'UsuarioClave', 'UsuarioFechaNac', 'UsuarioFechaIng', 'UsuarioBanco', 'UsuarioCuentaBanco', 'UsuarioFechaReg'], 'safe'],
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
        $query = Usuario::find();

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
            'UsuarioID' => $this->UsuarioID,
            'UsuarioFechaNac' => $this->UsuarioFechaNac,
            'UsuarioFechaIng' => $this->UsuarioFechaIng,
            'UsuarioFechaReg' => $this->UsuarioFechaReg,
            'RolID' => $this->RolID,
            'EmpresaID' => $this->EmpresaID,
            'CargoID' => $this->CargoID,
        ]);

        $query->andFilterWhere(['like', 'UsuarioNombre', $this->UsuarioNombre])
            ->andFilterWhere(['like', 'UsuarioApellido', $this->UsuarioApellido])
            ->andFilterWhere(['like', 'UsuarrioCedula', $this->UsuarrioCedula])
            ->andFilterWhere(['like', 'UsuarioCorreo', $this->UsuarioCorreo])
            ->andFilterWhere(['like', 'UsuarioClave', $this->UsuarioClave])
            ->andFilterWhere(['like', 'UsuarioBanco', $this->UsuarioBanco])
            ->andFilterWhere(['like', 'UsuarioCuentaBanco', $this->UsuarioCuentaBanco]);

        return $dataProvider;
    }
}
