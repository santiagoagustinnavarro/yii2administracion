<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RazonSocialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Razón Social';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="razon-social-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //  'id',
            'cuit',
            'nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
