<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Salida */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="salida-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'fecha')->Input('date') ?>

    <?= $form->field($model, 'movimiento_tipo_id')->dropdownList($select_movimiento, ['onchange'=>'selectMovTipo()','id'=>'movimiento_tipo','prompt'=>'selecione un movimiento'])?>

    <?= $form->field($model, 'razon_social_id')->dropdownList( $select_cuit, ['id'=>'razon','prompt'=>'selecione un razón social'])?>

    <?= $form->field($model, 'movimiento_concepto_id')->dropdownList($select_concepto, ['prompt'=>'selecione un concepto'])?>

    <?= $form->field($model, 'importe')->textInput(['id'=>'importe','type'=>'number', 'onkeyup'=>'calIva()']) ?>

    <?= $form->field($model, 'iva')->textInput(['type'=>'number', 'id'=>'iva','readonly'=> true]) ?>

    <?= $form->field($model, 'percepcion_id')->dropdownList($select_percepcion, ['onchange'=>'calPercepcion()','id'=>'provincia','prompt'=>'seleciona una provincia'])?>

    <?= $form->field($model, 'percepcion_monto')->textInput([ 'id'=>'percepcion','readonly'=> true]) ?>

    <br>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success','style'=>'width:100%']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

$this->registerJs("

    $('#importe').click( function() {
      $('#importe').val('')

        $('#iva').val('')
        $('#provincia').val('')
        $('#percepcion').val('')
    })

    function calIva() {
        var iva, importe
        importe=   $('#importe').val()
        iva = importe * 0.21
        $('#iva').val(iva)
      }




function selectMovTipo() {

      if( $('#movimiento_tipo').val()==1){
          $('#razon').val('')
          $('#provincia').val('')
            $('#percepcion').val('')
      }
      if( $('#movimiento_tipo').val()==2){
          $('#razon').val(1)
      }
  }


        function calPercepcion() {
            var iva, importe, provincia, percepcion
            iva = 0
            percepcion = ''
            importe = $('#importe').val()
            provincia=   $('#provincia').val()

            if(importe==0){
                 alert('el neto no puede ser 0')
                 $('#percepcion').val('')
                 $('#provincia').val('')
                 $('#importe').focus();

            }else{
                if( $('#movimiento_tipo').val()== ''){
                    alert('No eligio si es Entrada o Salida')
                    $('#movimiento_tipo').focus();
                         $('#provincia').val('')
                }
                if( $('#movimiento_tipo').val()== 1){
                      if( provincia == 1 ){
                          percepcion = importe * 0.025
                      }

                      if( provincia == 2 ){
                          percepcion = importe * 0.05
                      }

                      if( provincia == 3 ){
                          percepcion = importe * 0
                      }
                }

                if( $('#movimiento_tipo').val()== 2){
                      if( provincia == 1 ){
                          percepcion = importe * 0.01
                      }

                      if( provincia == 2 ){
                          percepcion = importe * 0.015
                      }

                      if( provincia == 3 ){
                          percepcion = importe * 0
                      }
                }


                  $('#percepcion').val(percepcion)
            }




        }



     ", \yii\web\VIEW::POS_HEAD

);



/*
Desglose KeyCode: https://keycode.info/

110 - Punto en el teclado izquierdo
190 - Punto en el teclado derecho
188 - Coma
*/
