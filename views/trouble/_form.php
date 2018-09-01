<?php

use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Trouble */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trouble-form">

    <?php
    $form = ActiveForm::begin();
    $model->author=User::getUsername();
    //$model->executor=User::getRole();
    ?>

    <?= $form->field($model, 'physical_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ip_address')->textInput() ?>

    <?= $form->field($model, 'executor')->textInput() ?>
	<?//= Html::dropDownList('executor', $selectedExecutor, ArrayHelper::map($executorList, 'id', 'name')) ?>

	<?= $form->field($model, 'author')->hiddenInput()->label(false)?>

    <?= $form->field($model, 'deadline')->textInput() ?>

    <?= $form->field($model, 'stages')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
