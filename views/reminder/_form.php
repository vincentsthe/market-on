<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\TimePickerAsset;

/* @var $this yii\web\View */
/* @var $model app\models\db\Reminder */
/* @var $form yii\widgets\ActiveForm */
TimePickerAsset::register($this);
?>

<div class="reminder-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'date')->textInput(['id'=>'date']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'transaksi')->dropDownList([ 'jual' => 'Jual', 'beli' => 'Beli', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php $this->registerJs(
    '   $("#date").datetimepicker({
            timepicker:false,
            format:"Y-m-d H:i",
        });',\yii\web\View::POS_READY);
?>

</div>
