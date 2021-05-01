<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MovmientoPercepcionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Movimiento Percepcions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movimiento-percepcion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Movimiento Percepcion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'provincia:ntext',
            'iva',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
