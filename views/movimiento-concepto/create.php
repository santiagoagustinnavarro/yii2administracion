<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SalidaConcepto */

$this->title = 'Nuevo';
$this->params['breadcrumbs'][] = ['label' => 'Conceptos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movmiento-concepto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
