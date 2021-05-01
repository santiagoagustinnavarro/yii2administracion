<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salida".
 *
 * @property int $id
 * @property string $fecha
 * @property int $concepto_id
 * @property int $importe
 * @property int $iva
 * @property int $precepcion_id
 *
 * @property MovimientoPercepcion $precepcion
 * @property MovimientoConcepto $concepto
 */
class Movimiento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movimiento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'movimiento_concepto_id','movimiento_tipo_id','razon_social_id', 'importe', 'iva', 'percepcion_id', 'percepcion_monto'], 'required'],
            [[ 'movimiento_concepto_id', 'movimiento_tipo_id','razon_social_id','percepcion_id'], 'integer'],
            [[ 'importe', 'iva', 'percepcion_monto'], 'double'],
            [['fecha'], 'safe'],
            [['percepcion_id'], 'exist', 'skipOnError' => true, 'targetClass' => MovimientoPercepcion::className(), 'targetAttribute' => ['percepcion_id' => 'id']],
            [['movimiento_concepto_id'], 'exist', 'skipOnError' => true, 'targetClass' => MovimientoConcepto::className(), 'targetAttribute' => ['movimiento_concepto_id' => 'id']],
            [['movimiento_tipo_id'], 'exist', 'skipOnError' => true, 'targetClass' => MovimientoTipo::className(), 'targetAttribute' => ['movimiento_tipo_id' => 'id']],
            [['razon_social_id'], 'exist', 'skipOnError' => true, 'targetClass' => RazonSocial::className(), 'targetAttribute' => ['razon_social_id' => 'id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'movimiento_concepto_id' => 'Concepto',
            'importe' => 'Neto sin IVA',
            'razon_social_id' => 'Razón social',
            'iva' => 'Iva 21%',
            'percepcion_id' => 'Provincia',
            'percepcion_monto' => 'Percepción',
            'movimiento_tipo_id' => 'Entrada / Salida',


        ];
    }

    /**
     * Gets query for [[Percepcion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPercepcion()
    {
        return $this->hasOne(MovimientoPercepcion::className(), ['id' => 'percepcion_id']);
    }


    public function getTipo()
    {
        return $this->hasOne(MovimientoTipo::className(), ['id' => 'movimiento_tipo_id']);
    }


    /**
     * Gets query for [[Concepto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getConcepto()
    {
        return $this->hasOne(MovimientoConcepto::className(), ['id' => 'movimiento_concepto_id']);
    }

    /**
     * Gets query for [[Razon]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRazon  ()
    {
        return $this->hasOne(RazonSocial::className(), ['id' => 'razon_social_id']);
    }

}
