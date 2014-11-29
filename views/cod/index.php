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

    <h1>Daftar Tawaran</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Create Cod', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
                    return "<a href='#'>Konfirmasi</a> | <a href='#'>Hapus</a>";
                } ,
                'format' => 'html'
            ]
        ],
        'tableOptions' => ['class' => 'table table-striped table-bordered','style'=>'width: 100% !important;']
    ]); ?>

</div>
