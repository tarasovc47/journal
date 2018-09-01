<?php

use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Trouble */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trouble-form">

    <?php $form = ActiveForm::begin();
    $model->author=User::getUsername();?>

    <?= $form->field($model, 'physical_address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ip_address')->textInput() ?>

	<?= $form->field($model, 'author')->hiddenInput()->label(false)?>

	<?= $form->field($model, 'deadline')->textInput() ?>

    <?= $form->field($model, 'stages')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
