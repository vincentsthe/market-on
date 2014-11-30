<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\db\Item */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
        <div class="col-sm-4">
            <?= Html::img($model->image_url,['width'=>250,'height'=>250]); ?>
        </div>    
        <div class="col-sm-8">
            <h1><?= $model->name ?></h1>
            <h4 style="margin-top:20px">Harga</h4>
            <h4><?= "Rp " . $model->price ?></h4>
            <h4 style="margin-top:30px">Deskripsi</h4>
            <h4><?= $model->description ?></h4>
        </div>
    </div>
    <?php /*DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'price',
            'image_url:url',
            'description:ntext',
            'quantity',
            'user_id',
            'category_id',
        ],
    ]) */?>

</div>
