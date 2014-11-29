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

<div class="signup-form">
    <?= Html::img($model->item->image_url,['width'=>250,'height'=>250]); ?>
    <?php $form = ActiveForm::begin(); ?>
    <label>Pembeli</label> : <?= $model->buyer->fullname; ?>

    <?= Html::activeHiddenInput($model,'buyer_id'); ?>

    <?= Html::activeHiddenInput($model, 'item_id'); ?>

    <?= Html::activeHiddenInput($model, 'seller_id'); ?>

    <?= $form->field($model, 'date')->textInput(['id'=>'cod-date']) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>



    

    <?= $form->field($model, 'quantity')->textInput() ?>
    <label>Lokasi Pertemuan</label>
    <div id='map-canvas' style='height:500px;'></div>
    <?= Html::activeHiddenInput($model, 'lat'); ?>

    <?=  Html::activeHiddenInput($model, 'lng'); ?>

    <br/>

    <input type='text' placeholder='nomor HP untuk SMS pengingat (opsional)'/>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Beli' : 'Ubah', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <script type="text/javascript">
        $("#cod-date").datetimepicker({
            format: 'Y-m-d H:i'
        });
    </script>
<script type="text/javascript">
    var lat = <?=$model->lat;?>;
    var lng = <?=$model->lng;?>;
    var mapOptions = {
            center: new google.maps.LatLng(lat,lng),
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

    
    $(document).ready(function(){initializeMarker();});
    function initializeMarker(){
        marker.setPosition(new google.maps.LatLng(lat,lng));
        google.maps.event.addListener(marker,'drag',function(e){
            //change 
            $("#cod-lat").val(marker.getPosition().lat());
            $("#cod-lng").val(marker.getPosition().lng());
        });
    }

</script>
</div>


