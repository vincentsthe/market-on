<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\db\Item */
/* @var $form yii\widgets\ActiveForm */
var_dump($model->attributes);
?>

<div class="item-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'image_url')->textInput(['maxlength' => 500]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= Html::activeHiddenInput($model,'user_id'); ?>
    <?php //echo$form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map($categories,'id','name')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
