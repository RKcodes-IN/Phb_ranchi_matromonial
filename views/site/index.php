<?php

/* @var $this yii\web\View */

use app\modules\admin\models\UserDetail;

$this->title = 'My Yii Application';
?>
<style>
	.btn-ng {
		background: #ff6f01;
		border: none;


	}

	.height {
		height: 100%;
	}

	.list li a {
		color: #000;
	}

	.card-footer {
		padding: 0.75rem 1.25rem;
		background-color: rgb(255 126 0 / 11%) !important;
		border-top: 1pxsolidrgba(0, 0, 0, .125);
	}

	.address {
		color: #bf1902;
	}
</style>
<div class="site-index">

	<div class="jumbotron bg-white">

		<div class="container-fluid">
			<div class="row">
				<aside class="col-md-3">

					<div class="card">
						<article class="filter-group">
							<header class="card-header">
								<a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
									<i class="icon-control fa fa-chevron-down"></i>
									<h6 class="title">Filter</h6>
								</a>
							</header>
							<div class="filter-content collapse show" id="collapse_1" style="">
								<div class="card-body">
									<form class="pb-3">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Search">
											<div class="input-group-append">
												<button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
											</div>
										</div>
									</form>

									<ul class="list-menu text-left list-unstyled text-dark  list">
										<li><a href="#">Hindu </a></li>
										<li><a href="#">Mangalik </a></li>
										<li><a href="#">Sikh </a></li>
										<li><a href="#">Khatri </a></li>
										<li><a href="#">Arora </a></li>
										<li><a href="#">Brahaman</a></li>
									</ul>

								</div> <!-- card-body.// -->
							</div>
						</article> <!-- filter-group  .// -->
						<article class="filter-group">
							<header class="card-header">
								<a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class="">
									<i class="icon-control fa fa-chevron-down"></i>
									<h6 class="title">City </h6>
								</a>
							</header>
							<div class="filter-content collapse show" id="collapse_2" style="">
								<div class="card-body">
									<label class="custom-control custom-checkbox">
										<input type="checkbox" checked="" class="custom-control-input">
										<div class="custom-control-label">Ranchi
											<b class="badge badge-pill badge-light float-right">120</b>
										</div>
									</label>
									<label class="custom-control custom-checkbox">
										<input type="checkbox" checked="" class="custom-control-input">
										<div class="custom-control-label">Jamshedpur
											<b class="badge badge-pill badge-light float-right">15</b>
										</div>
									</label>
									<label class="custom-control custom-checkbox">
										<input type="checkbox" checked="" class="custom-control-input">
										<div class="custom-control-label">Chandighar
											<b class="badge badge-pill badge-light float-right">35</b>
										</div>
									</label>
									<label class="custom-control custom-checkbox">
										<input type="checkbox" checked="" class="custom-control-input">
										<div class="custom-control-label">Bokaro
											<b class="badge badge-pill badge-light float-right">89</b>
										</div>
									</label>
									<label class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input">
										<div class="custom-control-label">Hazaribhag
											<b class="badge badge-pill badge-light float-right">30</b>
										</div>
									</label>
								</div> <!-- card-body.// -->
							</div>
						</article> <!-- filter-group .// -->


					</div> <!-- card.// -->

				</aside>
				<main class="col-md-9">



					<div class="row">

						<?php foreach ($users as $user) {
							
							$userDetail = UserDetail::find()->where(['user_id' => $user->id])->one();
						?>


							<div class="col-md-3">
								<figure class="height card card-product-grid border-1 shadow-sm rounded-3 py-3 justify-content-around">
									<div class="img-wrap">
										<?php if (!empty($userDetail->profile_image)) { ?>

											<img src="<?= $userDetail->profile_image ?>" class=" rounded-circle " width="200px" height="200px">
										<?php } else { ?>
											<img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" class="rounded-circle " width="200px" height="200px">

										<?php } ?>
										<?php if (!empty($userDetail->name)) { ?>
											<h5 class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> <?= $userDetail->name ?? '' ?></h5>
										<?php } else { ?>
											<h5 class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> <?= $user->first_name ?? '' ?> <?= $user->last_name ?? '' ?></h5>

										<?php } ?>
									</div> <!-- img-wrap.// -->
									<figcaption class="info-wrap">
										<div class="fix-height">
											<a href="#" class="title address"><?= $userDetail->occupication ?? '(Address Not Entred)' ?></a>
											<!-- price-wrap.// -->
										</div>
									</figcaption>
									<div class="card-footer">
										<a href="<?= \yii\helpers\Url::to(['/site/user-profile','id'=>$user->id]) ?>" class="btn btn-primary btn-ng">View Profile </a>
									</div>
								</figure>
							</div> <!-- col.// -->

						<?php } ?>


					</div> <!-- col.// -->



				</main>
			</div>
		</div>
	</div>


</div>