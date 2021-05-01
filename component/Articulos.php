<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articulos".
 *
 * @property int $articulo_nro
 * @property string $articulo_causa
 * @property string $articulo_documentacion
 */
class Articulos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articulos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['articulo_nro'], 'required', 'message' => ''],
            [[ 'articulo_causa'], 'required', 'message' => ''],
            [[ 'articulo_documentacion'], 'message' => ''],

            [['articulo_nro'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'articulo_nro' => 'Articulo Nro',
            'articulo_causa' => 'Articulo Causa',
            'articulo_documentacion' => 'Articulo Documentacion',
        ];
    }
}
