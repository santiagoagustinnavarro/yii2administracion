<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MovimientoPercepcion */

$this->title = 'Update Movimiento Percepcion: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Movimiento Percepcions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="movimiento-percepcion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
