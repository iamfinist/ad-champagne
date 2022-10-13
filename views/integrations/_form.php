<?php

use app\models\Integration;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Integration $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="integration-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'endpoint')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'request_type')->dropDownList(Integration::$requestTypesList) ?>

    <?= $form->field($model, 'params')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
