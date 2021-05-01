<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Movimiento;

/**
 * SalidaSearch represents the model behind the search form of `app\models\Salida`.
 */
class MovimientoSearch extends Movimiento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'movimiento_tipo_id','razon_social_id','movimiento_concepto_id', 'importe', 'iva', 'percepcion_id', 'percepcion_monto'], 'integer'],
            [['fecha'], 'safe'],

            [['tipo.nombre'], 'safe'],
            [['tipo.id'], 'safe'],
            [['razon.nombre'], 'safe'],
            [['concepto.nombre'], 'safe'],

        ];
    }


    public function attributes()
    {
        return array_merge(parent::attributes(),
        ['tipo.nombre'], ['razon.nombre'], ['concepto.nombre'] );
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
        $query = Movimiento::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);


        $query -> join('inner join',
                       'razon_social',
                       'razon_social.id = razon_social_id'
              );

       $query -> join('inner join',
                      'movimiento_concepto',
                      'movimiento_concepto.id = movimiento_concepto_id'
                    );


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'fecha' => $this->fecha,
            //'movimiento_tipo_id' => $this->movimiento_tipo_id,
            'razon_social_id' => $this->razon_social_id,
            'movimiento_concepto_id' => $this->movimiento_concepto_id,
            'importe' => $this->importe,
            'iva' => $this->iva,
            'percepcion_id' => $this->percepcion_id,
            'percepcion_monto' => $this->percepcion_monto,
        ]);

        $query->andFilterWhere(['like', 'movimiento_tipo_id', $this->getAttribute('tipo.nombre')]);
        $query->andFilterWhere(['like', 'razon_social.nombre', $this->getAttribute('razon.nombre')]);
        $query->andFilterWhere(['like', 'movimiento_concepto.nombre', $this->getAttribute('concepto.nombre')]);



        return $dataProvider;
    }
}
