<?php

use app\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Trouble;

/* @var $this yii\web\View */
/* @var $model app\models\Trouble */
/* @var $form yii\widgets\ActiveForm */
//var_dump(ArrayHelper::map(User::getExecutor(), 'id', 'name'));die;
?>

<div class="trouble-form">

    <?php
    $form = ActiveForm::begin();
    $model->author=User::getUsername();
    //$model->executor=User::getExecutor();
    ?>

    <?= $form->field($model, 'physical_address')->textInput() ?>

    <?= $form->field($model, 'ip_address')->textInput() ?>

    <?= $form->field($model, 'executor')
	    ->dropDownList(ArrayHelper::map(User::getExecutor(), 'id', 'name'), []) ?>

	<?= $form->field($model, 'author')->hiddenInput()->label(false)?>

    <?= $form->field($model, 'deadline')->textInput() ?>

	<?= $form->field($model, 'comment')->textarea() ?>

    <?/*= $form->field($model, 'stages')->dropDownList(Trouble::getStages()) */?>

	<?= $form->field($model, 'stages')->dropDownList(Trouble::getTroubleStages()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
