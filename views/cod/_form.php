<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\assets\TimePickerAsset;
use app\assets\MapAsset;
/* @var $this yii\web\View */
/* @var $model app\models\db\Cod */
/* @var $form yii\widgets\ActiveForm */
TimePickerAsset::register($this);
MapAsset::register($this);
?>

<div class="cod-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->textInput(['id'=>'cod-date']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'buyer_id')->textInput() ?>

    <?= $form->field($model, 'seller_id')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <div id='map-canvas' style='height:500px;'></div>
    <?= $form->field($model, 'lat')->textInput(['disabled'=>true]) ?>

    <?= $form->field($model, 'lng')->textInput(['disabled'=>true]) ?>

    <?= $form->field($model, 'item_id')->textInput(['disabled'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <script type="text/javascript">
        $("#cod-date").datetimepicker({
            format: 'Y-m-d H:i'
        });
    </script>
<script type="text/javascript">
    
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
            $("#cod-lat").val(marker.getPosition().lat());
            $("#cod-lng").val(marker.getPosition().lng());
        });
    }

</script>
</div>


