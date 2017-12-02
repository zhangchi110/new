<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\News */

$this->title = 'Update News: ' . $model->new_id;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->new_id, 'url' => ['view', 'id' => $model->new_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="news-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
