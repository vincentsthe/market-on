<?php use yii\helpers\Html; ?>
<div class="login-form"><!--login form-->
							<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
							<center>
							<h2><?=$model->fullname;?></h2>
								<div class="pp"><?=Html::img(Yii::getAlias('@web')."/img/mockup/pp.jpg",['width'=>100,'height'=>100]); ?></div><br />
								<h7>
									<i class="fa fa-map-marker"></i>  Bandung, Jawa Barat, Indonesia  <!-- <a href="#"><i class="fa fa-pencil"></i></a> --><br />
									<i class="fa fa-envelope"></i>  <?=$model->username;?>  <!-- <a href="#"><i class="fa fa-pencil"></i></a> --><br />
									<i class="fa fa-users"></i>  <?=($model->is_seller)?'Penjual':'Pembeli';?>  <!-- <a href="#"><i class="fa fa-pencil"></i></a> --><br />
								</h7>
								<form action="#">
										<button type="button" class="btn btn-default">
											Follow
										</button>
									</form>
								</div>
							</div>
							</center>
						<h2 class="title text-center">Daftar penjualan</h2>
				<?php foreach($model->items as $item) :?>
				<div class="col-xs-4">
								<div class="col-xs-4">
					                <a href="#">
					                    <img class="img-hover" src="http://placehold.it/75x75" alt="">
					                </a>
					            </div>
								<div class="col-xs-8"><h4><?=$item->name;?></h4>
									<p>
										Rp<?=$item->price;?><br />
										<i class="fa fa-th-large"></i>Stok <?=$item->quantity;?><br />
									</p>
								</div>
							</div>
				<?php endforeach; ?>
							
			</div>