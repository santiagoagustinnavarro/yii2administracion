<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MovimientoPercepcion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movimiento-percepcion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'provincia')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'iva')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
