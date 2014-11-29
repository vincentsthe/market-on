<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\PlaceAsset;
use yii\widgets\ActiveForm;
use app\models\forms\LoginForm;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
PlaceAsset::register($this);
if (isset($this->context->login_form)) {
    $login_form = $this->context->login_form;
} else {
    $login_form = new LoginForm();
}

//var_dump($model);
//exit();

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<header id="header"> 
    
    <div class='header-middle'>
        <div class='container'>
            <div class='row'>
                <div class='col-xs-4'>
                    <div class='logo pull-left'>
                        <?= Html::a(Html::img(Yii::getAlias('@web')."/img/logo.png"),['/site/home']);?>
                    </div>
                </div>
                <div class='col-xs-8'>
                    <div class='shop-menu pull-right'>
                        <?php

                            echo Nav::widget([
                                'options' => ['class' => 'nav navbar-nav'],
                                'items' => [
                                    [
                                        //dropdown
                                        'label' => '<i class="fa fa-user"></i> Logout',
                                        'url' => ['/site/logout'],'linkOptions' => ['data-method' => 'post'],
                                        'visible' => !Yii::$app->user->isGuest
                                    ],
                                    ['label' => '<i class="fa fa-dollar"></i>Jual Barang', 'url' => ['/item/create']],
                                    ['label' => '<i class="fa fa-list"></i> Lihat Tawaran', 'url' => ['/cod/index']],
                                    ['label' => '<i class="fa fa-calendar"></i> Jadwal', 'url' => ['/cod/calendar']],
                                    //['label' => '<i class="fa fa-crosshairs"></i> Locator', 'url' => ['/locator/index']],
                                ],
                                'encodeLabels' => false
                            ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
    <section style='min-height:595px;'>
        <div class="container">
            <div class="row">
                <?php if(isset($this->context->home) && ($this->context->home == true)): ?>
                    <div id="map"  style="height:500px;margin: 0px 0px 40px 0px"></div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <?php if (Yii::$app->user->isGuest): ?>
                        <h2>User Login</h2>
                        <div class='login-form'>
                        <?php $form = ActiveForm::begin([
                            'action' => ['/site/login'],
                            'fieldConfig' => [
                                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                'labelOptions' => ['class' => 'col-lg-1 control-label'],
                            ],
                        ]); ?>
                        <?= $form->errorSummary($login_form); ?>
                        <?= Html::activeTextInput($login_form, 'username',['placeholder' => 'Username']); ?>

                        <?= Html::activePasswordInput($login_form, 'password',['placeholder' => 'Password']); ?>
                        <?= Html::activeCheckbox($login_form,'rememberMe',['class' => 'checkbox']); ?>
                        <br/>
                        <?= Html::submitButton('Login',['class' => 'btn btn-default']); ?>
                        <br/>
                        Belum punya akun? <?= Html::a('Daftar di sini',['/user/create']); ?>
                        <?php ActiveForm::end(); ?>
                        </div>
                        <br/>
                        <?php else: ?>
                        <h2>Welcome, <?=Yii::$app->user->identity->fullname; ?>  </h2>
                        <center>
                        <?= Html::a('Edit Profil',['/user/update','id'=>Yii::$app->user->identity->id]); ?>
                        </center>
                        <br/>
                        <?php endif; ?>
                        
                        <div class="brands_products"><!--brands_products-->
                            <h2>Kategori</h2>
                            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            Elektronik
                                        </a>
                                    </h4>
                                </div>
                                <div id="sportswear" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">Laptop </a></li>
                                            <li><a href="#">Handphone </a></li>
                                            <li><a href="#">Tablet </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            Pakaian
                                        </a>
                                    </h4>
                                </div>
                                <div id="mens" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">Sepatu</a></li>
                                            <li><a href="#">Baju</a></li>
                                            <li><a href="#">Celana</a></li>
                                            <li><a href="#">Aksesoris</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#womens">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            Kendaraan
                                        </a>
                                    </h4>
                                </div>
                                <div id="womens" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">Mobil</a></li>
                                            <li><a href="#">Motor</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Perkakas</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Makanan & Minuman</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Hunian</a></h4>
                                </div>
                            </div>
                        </div><!--/category-products-->
                        </div><!--/brands_products-->
                    
                    </div>
                </div>
                <div class="col-sm-9">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer"><!--Footer-->
        
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2014 Appropria Inc. All rights reserved.</p>
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
