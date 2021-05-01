<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salida_concepto".
 *
 * @property int $id
 * @property int $nombre
 *
 * @property MovimientoConcepto[] $salidas
 */
class MovimientoConcepto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movimiento_concepto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Salidas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMovimiento()
    {
        return $this->hasMany(Movimiento::className(), ['concepto_id' => 'id']);
    }
}
