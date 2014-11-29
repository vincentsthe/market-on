<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\db\Item */

$this->title = 'Update Item: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="item-update">

    <h1>Update Barang</h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories
    ]) ?>

</div>
