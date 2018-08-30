<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TroubleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Troubles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trouble-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Trouble', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'physical_address:ntext',
            'ip_address',
            'executor:ntext',
            'operator:ntext',
            //'deadline',
            //'stages',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
