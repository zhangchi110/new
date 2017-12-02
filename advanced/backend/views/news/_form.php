<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'new_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_fid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_time')->textInput() ?>

    <?= $form->field($model, 'new_uid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_endtime')->textInput() ?>

    <?= $form->field($model, 'new_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'new_authour')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
