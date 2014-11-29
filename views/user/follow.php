<?php use yii\helpers\Html; ?>
<div class="login-form"><!--login form-->
							<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
							<h2>Muhammad Yafi</h2>
								<div class="pp"><?=Html::img(Yii::getAlias('@web')."/img/mockup/pp.jpg",['width'=>100,'height'=>100]); ?></div><br />
								<h7>
									<i class="fa fa-map-marker"></i>  Bandung, Jawa Barat, Indonesia  <!-- <a href="#"><i class="fa fa-pencil"></i></a> --><br />
									<i class="fa fa-phone"></i>  086 666 666 666  <!-- <a href="#"><i class="fa fa-pencil"></i></a> --><br />
									<i class="fa fa-envelope"></i>  yafi@google.com  <!-- <a href="#"><i class="fa fa-pencil"></i></a> --><br />
									<i class="fa fa-users"></i>  Seller  <!-- <a href="#"><i class="fa fa-pencil"></i></a> --><br />
								</h7>
								<form action="#">
										<button type="button" class="btn btn-default">
											Follow
										</button>
									</form>
								</div>
							</div>
						<h2 class="title text-center">Daftar penjualan</h2>
				<?php for($i = 0; $i < 4; $i++) :?>
				<div class="col-xs-4">
								<div class="col-xs-4">
					                <a href="#">
					                    <img class="img-hover" src="http://placehold.it/75x75" alt="">
					                </a>
					            </div>
								<div class="col-xs-8"><h4>Asus Zenfone 6</h4>
									<p>
										<i class="fa fa-clock-o"></i>  4 Mei 2014<br />
										<i class="fa fa-usd"></i>  IDR 2.500.000<br />
										<i class="fa fa-th-large"></i>  10 pcs<br />
									</p>
								</div>
							</div>
				<?php endfor; ?>
							
			</div>