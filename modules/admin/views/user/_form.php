<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textarea(['rows' => 1]) ?>

	<?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'role')->listBox(
			array('admin'=>"Администратор",'observer'=>"Наблюдатель",'executor'=>"Исполнитель",'operator'=>"Оператор"))
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
