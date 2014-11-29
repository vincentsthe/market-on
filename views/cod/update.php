<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\db\Cod */

$this->title = 'Update Cod: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cod-update">

    <h1><?= $model->item->name ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
