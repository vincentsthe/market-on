<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cod-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cod', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date',
            'description:ntext',
            'buyer_id',
            'seller_id',
            // 'quantity',
            // 'lat',
            // 'lng',
            // 'item_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
