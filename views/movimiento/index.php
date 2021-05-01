<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**** agregadas  ****/
use yii\helpers\Url;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $searchModel app\models\SalidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

Modal::begin([
  'id'=>'modal',
  'size'=>'modal-md',
]);

Modal::end();



$this->title = 'Movimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salida-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
      <?= Html::a('Nueva', ['create'], ['id'=>'movimiento_nuevo','class' => 'btn btn-success']) ?>

  <?php

    $url = Url::to(['excel','movimiento_tipo_id'=>1]);
    $atributos = ['class' =>'btn btn-success'];
    echo  Html::a('Exportar a excel',  $url, $atributos);

    ?>
  </p>
    <br>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //  'id',
            [
              'class' => 'yii\grid\DataColumn',
              'visible' => '1', // 0 oculta esta columna
              'attribute' => 'fecha',
              'format' => ['date', 'php: d-m-Y'] ,
              'headerOptions' => ['style'=>'font-weight:bold'],
              'contentOptions' => ['style' => 'width:120px;', 'class' => 'text-center'], // ancho de la columna aliniación del texto
            ],
            [
              'class' => 'yii\grid\DataColumn',
              'visible' => '1', // 0 oculta esta columna
              'attribute' => 'tipo.nombre', // el dato que se ve en el crud
              'filter'=> $filter_movimiento_tipo,
              'label'=> 'Entrada/Salida',
              'headerOptions' => ['style'=>'font-weight:bold'],
              'contentOptions' => ['style' => 'width:120px;', 'class' => 'text-center'], // ancho de la columna aliniación del texto
            ],

            [
              'class' => 'yii\grid\DataColumn',
              'visible' => '1', // 0 oculta esta columna
              'attribute' => 'razon.nombre', // el dato que se ve en el crud
              'label'=> 'Razón social',
              'headerOptions' => ['style'=>'font-weight:bold'],
              'contentOptions' => ['style' => 'width:120px;', 'class' => 'text-center'], // ancho de la columna aliniación del texto
            ],

            [
              'class' => 'yii\grid\DataColumn',
              'visible' => '1', // 0 oculta esta columna
              'attribute' => 'concepto.nombre', // el dato que se ve en el crud
              'label'=> 'Concepto',
              'headerOptions' => ['style'=>'font-weight:bold'],
              'contentOptions' => ['style' => 'width:120px;', 'class' => 'text-center'], // ancho de la columna aliniación del texto
            ],
            'importe',
            'iva',
            //'percepcion_id',
            'percepcion_monto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
