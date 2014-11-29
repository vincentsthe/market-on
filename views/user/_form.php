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

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'fullname')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'is_seller')->checkBox() ?>

    <div id='map-canvas' style='height:600px;'></div>

    <?= $form->field($model, 'lat')->textInput(['id'=>'lat']) ?>

    <?= $form->field($model, 'lng')->textInput(['id'=>'lng']) ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map($categories,'id','name')) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    var directionsService = new google.maps.DirectionsService();
    var directionsResult;
    var locationData;
    var mapOptions = {
            center: new google.maps.LatLng(-6.8933215,107.6115761),
            zoom: 15
       };
    var map = new google.maps.Map(
        document.getElementById("map-canvas"),
        mapOptions
    );
    var marker = new google.maps.Marker({
        draggable: true,
        title: 'Start',
        map: map,
    });

    
    $(document).ready(function(){initialize();});
    function initialize(){
        marker.setPosition(new google.maps.LatLng(-6.8933215,107.6115761));
        google.maps.event.addListener(marker,'drag',function(e){
            //change 
            $("#lat").val(marker.getPosition().lat());
            $("#lng").val(marker.getPosition().lng());
        });
    }
    /*
    function changeLocation(){
        var id = $("#locationmodel-name").val() - 1; //dari dropdownnya
        $("#locationmodel-lat").val(locationData[id].lat);
        $("#locationmodel-lng").val(locationData[id].lng);
        marker.setPosition(new google.maps.LatLng(locationData[id].lat,locationData[id].lng));
    }*/

/*
    function saveLocation(){
        $("#notification").html("<div class='alert alert-warning'>Saving...</div>");
        $.post(
            '<?=Yii::$app->urlManager->createUrl(["location/setlocation"]);?>',
            {
                "_csrf" : csrf,
                "id" : $("#locationmodel-name").val(),
                "lat": $("#locationmodel-lat").val(),
                "lng":  $("#locationmodel-lng").val(),
            },
            function(data,status){
                $("#notification").html("");
            }
        ).error(function(){
            $("#notification").html("Error. Please refresh the page.");
        });
    }*/

</script>
