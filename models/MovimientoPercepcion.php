<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "movimiento_percepcion".
 *
 * @property int $id
 * @property string $provincia
 * @property float $iva
 *
 * @property Movimiento[] $movimientos
 */
class MovimientoPercepcion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movimiento_percepcion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['provincia', 'iva'], 'required'],
            [['provincia'], 'string'],
            [['iva'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'provincia' => 'Provincia',
            'iva' => 'Iva',
        ];
    }

    /**
     * Gets query for [[Movimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMovimientos()
    {
        return $this->hasMany(Movimiento::className(), ['precepcion_id' => 'id']);
    }
}
