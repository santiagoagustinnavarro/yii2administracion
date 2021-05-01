<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Salida */

$this->title = 'Nueva';
$this->params['breadcrumbs'][] = ['label' => 'Movimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="movimiento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'select_concepto'=>$select_concepto,
        'select_movimiento'=>$select_movimiento,
        'select_cuit' => $select_cuit,
        'select_percepcion' => $select_percepcion ,

    ]) ?>

</div>
