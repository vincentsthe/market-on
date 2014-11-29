<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ReminderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reminders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reminder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Reminder', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'date',
            'description:ntext',
            'transaksi',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
