<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Trouble */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trouble-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'physical_address')->textarea(['rows' => 6]) ?>

    <?= "Введите IP-адрес оборудования";
    echo MaskedInput::widget([
	    'name' => 'input-34',
	    'clientOptions' => [
		    'alias' =>  'ip'
	    ],
    ]);

    // данное решение здесь не самое подходящее, в последствии можно сделать всё правильно
    ?>

    <?= $form->field($model, 'executor')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'operator')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'deadline')->textInput() ?>

    <?= $form->field($model, 'stages')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
