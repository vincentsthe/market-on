<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\db\Item */
/* @var $form yii\widgets\ActiveForm */
//var_dump($model->attributes);
?>

<div class="signup-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?= $form->errorSummary($model); ?>
    <?= Html::activeTextInput($model, 'name',['placeholder'=>'nama']); ?>

    <?= Html::activeTextInput($model, 'price',['placeholder'=>'harga']); ?>

    <?= $form->field($model,'_file')->fileInput(); ?>

    <?php //$form->field($model, 'image_url')->textInput(['maxlength' => 500]) ?>

    <?= $form->field($model, 'description')->textArea(['rows'=>6]);?>

    <?= Html::activeTextInput($model, 'quantity',['placeholder'=>'jumlah']); ?>

    <?= Html::activeHiddenInput($model,'user_id'); ?>
    <?php //echo$form->field($model, 'user_id')->textInput() ?>


    <?= Html::activeDropDownList($model, 'category_id',ArrayHelper::map($categories,'id','name'),['placeholder'=>'kategori']); ?>
    <br/><br/>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
