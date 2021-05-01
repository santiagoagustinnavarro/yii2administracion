<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movimiento_tipo".
 *
 * @property int $id
 * @property int $nombre
 *
 * @property MovimientoTipo[] $salidas
 */
class MovimientoTipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movimiento_tipo';
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
        return $this->hasMany(Movimiento::className(), ['movimiento_tipo_id' => 'id']);
    }
}
