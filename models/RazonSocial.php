<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "razon_social".
 *
 * @property int $id
 * @property string $cuit
 * @property string $nombre
 *
 * @property Movimiento[] $movimientos
 */
class RazonSocial extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'razon_social';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cuit', 'nombre'], 'required'],
            [['cuit'], 'string', 'max' => 20],
            [['nombre'], 'string', 'max' => 35],
            [['cuit'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cuit' => 'Cuit',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Movimientos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMovimientos()
    {
        return $this->hasMany(Movimiento::className(), ['razon_social_id' => 'id']);
    }
}
