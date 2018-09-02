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
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'physical_address:ntext',
            'ip_address',
            'executor:ntext',
            'author:ntext',
            'comment:ntext',
            'deadline',
            'stages',
        ],
    ]) ?>

</div>
