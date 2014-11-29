<?php
	use app\assets\PlaceAsset;
	use yii\helpers\Html;
	PlaceAsset::register($this);
?>

<div class="features_items"><!--features_items-->
	<h2 class="title text-center">Terpopuler</h2>
	<?php foreach ($items as $item) : ?>
		<div class="col-sm-4">
			<div class="product-image-wrapper">
				<div class="single-products">
						<div class="productinfo text-center">
							<?= Html::img($item->image_url,['width'=>250,'height'=>250]); ?>
							<h2>Rp<?=$item->price;?></h2>
							<p><?=$item->name; ?></p>

							<ps>Penjual: <?=Html::a($item->user->fullname,['/user/follow','id'=>$item->user->id]);?></ps><br />
							<ps><i class="fa fa-th-large"></i> Stok <?=$item->quantity;?></ps>
							<ps><i class="fa fa-crosshairs"></i> Bandung</ps><br>

							<?=Html::a('Beli',['/cod/create','item_id'=>$item->id],['class'=>'btn btn-primary']); ?>
						</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
<!--features_items-->
</div>
<div class="category-tab"><!--category-tab-->
	<div class="col-sm-12">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tshirt" data-toggle="tab">Pakaian</a></li>
			<li><a href="#blazers" data-toggle="tab">Elektronik</a></li>
			<li><a href="#sunglass" data-toggle="tab">Makanan & Minuman</a></li>
			<li><a href="#kids" data-toggle="tab">Hunian</a></li>
		</ul>
	</div>
	<div class="tab-content">
		<div class="tab-pane fade active in" id="tshirt" >
			<?php for ($i = 0; $i < 4; $i++): ?>
			<div class="col-sm-3">
				<div class="product-image-wrapper">
					<div class="single-products">
					<div class="productinfo text-center">
						<?=Html::img(Yii::getAlias('@web')."/img/mockup/celana_jeans.jpg",['width'=>200,'height'=>200]); ?>
						<h2>Rp200000</h2>
						<p>Celana Jeans</p>
						<ps>by Muhammad Yafi</ps><br />
						<ps><i class="fa fa-th-large"></i> 10 pcs</ps>
						<ps><i class="fa fa-crosshairs"></i> Bandung</ps>
					</div>
					</div>
					</div>
			</div>
			<?php endfor; ?>
		
		</div>
	</div>
</div><!--/category-tab-->

<!-- <div class="recommended_items">
	<h2 class="title text-center">Rekomendasi</h2>
	
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">	
				<div class="col-sm-4">
					<div class="product-image-wrapper">
			<div class="single-products">
					<div class="productinfo text-center">
						<img src="images/home/zenfone6.png" alt="" />
						<h2>$56</h2>
						<p>Samsung Zenfone 6</p>
						<ps>by Muhammad Yafi</ps><br />
						<ps><i class="fa fa-th-large"></i> 10 pcs</ps>
						<ps><i class="fa fa-crosshairs"></i> Bandung</ps>
					</div>
			</div>
		</div>
				</div>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
			<div class="single-products">
					<div class="productinfo text-center">
						<img src="images/home/zenfone6.png" alt="" />
						<h2>$56</h2>
						<p>Samsung Zenfone 6</p>
						<ps>by Muhammad Yafi</ps><br />
						<ps><i class="fa fa-th-large"></i> 10 pcs</ps>
						<ps><i class="fa fa-crosshairs"></i> Bandung</ps>
					</div>
			</div>
		</div>
				</div>
				<div class="col-sm-4">
					<div class="product-image-wrapper">
			<div class="single-products">
					<div class="productinfo text-center">
						<img src="images/home/zenfone6.png" alt="" />
						<h2>$56</h2>
						<p>Samsung Zenfone 6</p>
						<ps>by Muhammad Yafi</ps><br />
						<ps><i class="fa fa-th-large"></i> 10 pcs</ps>
						<ps><i class="fa fa-crosshairs"></i> Bandung</ps>
					</div>
			</div>
		</div>
			</div>
			<div class="item">	
				<div class="col-sm-4">
					<div class="product-image-wrapper">
			<div class="single-products">
					<div class="productinfo text-center">
						<img src="images/home/zenfone6.png" alt="" />
						<h2>$56</h2>
						<p>Samsung Zenfone 6</p>
						<ps>by Muhammad Yafi</ps><br />
						<ps><i class="fa fa-th-large"></i> 10 pcs</ps>
						<ps><i class="fa fa-crosshairs"></i> Bandung</ps>
					</div>
			</div>
		</div>
				</div>
			</div>
		</div>
		 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		  </a>
		  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		  </a>			
	</div>
</div> -->
</div>