<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\assets\MapAsset;
MapAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\models\db\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="signup-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= Html::activeTextInput($model,'username',['placeholder' => 'username']); ?>
    <?= Html::activePasswordInput($model,'password',['placeholder'=>'password']); ?>
    <?= Html::activeTextInput($model,'fullname',['placeholder' => 'fullname']); ?>
    <?= Html::activeDropDownList($model, 'is_seller',['1'=>'Penjual','0'=>'Pembeli']); ?>
    <br/>
    <br/>
    <?= Html::activeHiddenInput($model,'lat',['placeholder'=>'latitude']); ?>
    <?= Html::activeHiddenInput($model,'lng',['placeholder'=>'longitude']); ?>
    <?= Html::activeDropDownList($model,'category_id',ArrayHelper::map($categories,'id','name')); ?>
    <?= Html::activeTextArea($model,'description'); ?>
    <?php // $form->field($model, 'username')->textInput(['maxlength' => 100]) ?>

    <?php //$form->field($model, 'password')->passwordInput(['maxlength' => 100]) ?>

    <?php //$form->field($model, 'fullname')->textInput(['maxlength' => 100]) ?>

    <label>Alamat</label>
    <div id='map-canvas' style='height:600px;'></div>

    <?php //echo $form->field($model, 'lat')->textInput(['disabled'=>true]) ?>

    <?php //echo $form->field($model, 'lng')->textInput(['disabled'=>true]) ?>

    <?php //echo $form->field($model, 'category_id')->dropDownList(ArrayHelper::map($categories,'id','name')) ?>

    <?php //echo $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <br/>
    <div class='row'> 
    <input type='checkbox' style='width:20px; height: 20px; display: inline-block;' /> Berlangganan via email
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    var directionsService = new google.maps.DirectionsService();
    var lat = <?=$model->lat;?>;
    var lng = <?=$model->lng;?>;
    console.log(lat);
    console.log(lng);
    var directionsResult;
    var locationData;
    var mapOptions = {
            center: new google.maps.LatLng(lat,lng),
            zoom: 15
       };
    var map1 = new google.maps.Map(
        document.getElementById("map-canvas"),
        mapOptions
    );
    var marker = new google.maps.Marker({
        draggable: true,
        title: 'Start',
        map: map1,
    });

    
    $(document).ready(function(){initializeMarker();});
    function initializeMarker(){
        //marker.setPosition(new google.maps.LatLng(-6.8933215,107.6115761));
        marker.setPosition(new google.maps.LatLng(lat,lng));
        google.maps.event.addListener(marker,'drag',function(e){
            //change 
            $("#user-lat").val(marker.getPosition().lat());
            $("#user-lng").val(marker.getPosition().lng());
        });
    }
</script>
