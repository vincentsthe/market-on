<?php

namespace app\assets;

use yii\web\AssetBundle;

class PlaceAsset extends AssetBundle {
	public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
    	'js/place.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'app\assets\MapAsset',
    ];
}