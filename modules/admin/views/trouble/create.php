<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Trouble */

$this->title = 'Create Trouble';
$this->params['breadcrumbs'][] = ['label' => 'Troubles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trouble-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
