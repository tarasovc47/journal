<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Trouble */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Troubles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trouble-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Назначить исполнителя', ['setExecutor', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'physical_address:ntext',
            'ip_address',
            'executor:ntext',
            'author:ntext',
            'deadline',
            'stages',
        ],
    ]) ?>

</div>
