<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\db\Cod */

$this->title = 'Create Cod';
$this->params['breadcrumbs'][] = ['label' => 'Cods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cod-create">

    <h1><?= $model->item->name ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
