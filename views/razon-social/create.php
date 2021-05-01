<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RazonSocial */

$this->title = 'Nuevo';
$this->params['breadcrumbs'][] = ['label' => 'Razon Social', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="razon-social-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
