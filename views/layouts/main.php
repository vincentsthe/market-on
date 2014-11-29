<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\PlaceAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
PlaceAsset::register($this);
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
    <header id="header"><!--header-->       
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.html"><img src="<?= Yii::$app->request->BaseUrl ?>/img/home/logo.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <div class="search_box pull-right">
                                    <input type="text" placeholder="Search"/>
                                </div>
                                <li><a href="#"><i class="fa fa-user"></i> Akun</a></li>
                                <li><a href="#"><i class="fa fa-dollar"></i> Jual barang</a></li>
                                <li><a href="checkout.html"><i class="fa fa-list"></i> Lihat tawaran</a></li>
                                <li><a href="cart.html"><i class="fa fa-calendar"></i> Schedule</a></li>
                                <li><a href="login.html"><i class="fa fa-crosshairs"></i> Locator</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    </header><!--/header-->
    

    <section>
        <div class="container">
            <div class="row">
                <?php if(isset($this->context->home) && ($this->context->home == true)): ?>
                    <div id="map"  style="height:500px;margin: 0px 0px 40px 0px"></div>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>User Login</h2>
                        <div class="login-form"><!--login form-->
                            <form action="#">
                                <input type="text" placeholder="Username" />
                                <input type="email" placeholder="Password" />
                                <span>
                                    <input type="checkbox" class="checkbox"> 
                                    Keep me signed in
                                </span>
                                <button type="submit" class="btn btn-default">Login</button> <br />
                            </form>
                        </div><!--/login form-->
                        
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
