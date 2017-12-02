<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'new_id',
            'new_name',
            'new_content',
            'new_fid',
            'new_time',
            // 'new_uid',
            // 'new_status',
            // 'new_endtime',
            // 'new_desc',
            // 'imageFile',
            // 'new_authour',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
