<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'new_id') ?>

    <?= $form->field($model, 'new_name') ?>

    <?= $form->field($model, 'new_content') ?>

    <?= $form->field($model, 'new_fid') ?>

    <?= $form->field($model, 'new_time') ?>

    <?php // echo $form->field($model, 'new_uid') ?>

    <?php // echo $form->field($model, 'new_status') ?>

    <?php // echo $form->field($model, 'new_endtime') ?>

    <?php // echo $form->field($model, 'new_desc') ?>

    <?php // echo $form->field($model, 'imageFile') ?>

    <?php // echo $form->field($model, 'new_authour') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
