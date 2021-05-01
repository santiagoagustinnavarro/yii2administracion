<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MovimientoPercepcion */

$this->title = 'Create Movimiento Percepcion';
$this->params['breadcrumbs'][] = ['label' => 'Movimiento Percepcions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movimiento-percepcion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
