<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\News */

$this->title = $model->new_id;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->new_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->new_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'new_id',
            'new_name',
            'new_content',
            'new_fid',
            'new_time',
            'new_uid',
            'new_status',
            'new_endtime',
            'new_desc',
            'imageFile',
            'new_authour',
        ],
    ]) ?>

</div>
