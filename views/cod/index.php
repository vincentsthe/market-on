<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CodSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cods';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::csrfMetaTags() ?>
<div class="cod-index">
    <?php if (Yii::$app->user->identity->is_seller): ?>
    <h1>Daftar Tawaran</h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'date',
            [
                'label' => 'Item',
                'value' => function($model){ return $model->item->name; }
            ],
            'description:ntext',
            [
                'label' => 'Peminat',
                'value' => function($model){
                    return $model->buyer->fullname;
                },
                
            ],
            'quantity',

            //'seller_id',
            // 'quantity',
            // 'lat',
            // 'lng',
            // 'item_id',

            [
                'label' => 'Aksi',
                'value' => function($model){
                    return Html::a('<i class="fa fa-check"></i>',Yii::$app->urlManager->createUrl(['/cod/accept','id'=>$model->id])).
                    Html::a('<i class="fa fa-times"></i>',['/cod/delete','id'=>$model->id],['data-method'=>'post']);
                } ,
                'format' => 'html'
            ]
        ],
        'tableOptions' => ['class' => 'table table-striped table-bordered','style'=>'width: 100% !important;']
    ]); ?>
    <?php else: ?>
    <h1>Tawaran anda</h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'date',
            [
                'label' => 'Item',
                'value' => function($model){ return $model->item->name; }
            ],
            'description:ntext',
            [
                'label' => 'Penjual',
                'value' => function($model){
                    return $model->seller->fullname;
                },
                
            ],
            'quantity',

            //'seller_id',
            // 'quantity',
            // 'lat',
            // 'lng',
            // 'item_id',

            [
                'label' => 'Aksi',
                'value' => function($model){
                    return Html::a('<i class="fa fa-pencil"></i>',['/cod/update','id'=>$model->id]).
                    Html::a('<i class="fa fa-times"></i>',['/cod/delete','id'=>$model->id],['data-method'=>'post']);
                } ,
                'format' => 'html'
            ]
        ],
        'tableOptions' => ['class' => 'table table-striped table-bordered','style'=>'width: 100% !important;']
    ]); ?>
    <?php endif; ?>

</div>
