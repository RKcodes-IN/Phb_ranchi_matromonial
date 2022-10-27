<?php

/* @var $this yii\web\View */

use app\models\User;
use app\modules\admin\models\UserDetail;
use yii\helpers\Url;

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
                                    <h6 class="title">Filter By Cast</h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_1" style="">
                                <div class="card-body">
                                   

                                    <ul class="list-menu text-left list-unstyled text-dark  list">
                                        <?php
                                        foreach (UserDetail::getCastOption() as $ud) {
                                            if ($ud == 'Sikh') {
                                                echo "<li><a href='search?cast=1'>" . $ud . "</li>";
                                            } elseif ($ud == 'Khatri') {
                                                echo "<li><a href='search?cast=2'>" . $ud . "</li>";
                                            } else if ($ud == 'Arora') {
                                                echo "<li><a href='search?cast=3'>" . $ud . "</li>";
                                            } else if ($ud == 'Brahmin') {
                                                echo "<li><a href='search?cast=4'>" . $ud . "</li>";
                                            } else if ($ud = 'Other') {
                                                echo "<li><a href='search?cast=5'>" . $ud . "</li>";
                                            }
                                        }



                                        ?>
                                    </ul>

                                </div> <!-- card-body.// -->
                            </div>
                        </article> <!-- filter-group  .// -->
                        <article class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class="">
                                    <i class="icon-control fa fa-chevron-down"></i>
                                    <h6 class="title">Filter by Age </h6>
                                </a>
                            </header>
                            <div class="filter-content collapse show" id="collapse_2" style="">
                                <div class="filter-content collapse show" id="collapse_2" style="">
                                    <ul class="list-unstyled mt-4">
                                        <li class="badge badge-primary "><a href='search?age=1' class="text-white " style="font-size: 18px;">20-25</a></li>
                                        <li class="badge badge-success"><a href='search?age=2' class="text-white " style="font-size: 18px;">26-30</a></li>
                                        <li class="badge badge-info"><a href='search?age=3' class="text-white " style="font-size: 18px;">30+</a></li>
                                    </ul>
                                </div>
                            </div>
                        </article> <!-- filter-group .// -->


                    </div> <!-- card.// -->

                </aside>
                <main class="col-md-9">



                    <div class="row">
                        <?php
                        // var_dump($search);exit;

                        ?>
                        <?php foreach ($search as $sear) {
                            $user = User::find()->where(['id' => $sear->user_id])->andWhere(['status' => User::STATUS_ACTIVE])->one();

                        ?>


                            <div class="col-md-3">
                                <figure class="height card card-product-grid border-1 shadow-sm rounded-3 py-3 justify-content-around">
                                    <div class="img-wrap">
                                        <?php if (!empty($sear->profile_image)) { ?>

                                            <img src="<?= $sear->profile_image ?>" class=" rounded-circle " width="200px" height="200px">
                                        <?php } else { ?>
                                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" class="rounded-circle " width="200px" height="200px">

                                        <?php } ?>
                                        <?php if (!empty($sear->name)) { ?>
                                            <h5 class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> <?= $sear->name ?? '' ?></h5>
                                        <?php } else { ?>
                                            <h5 class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> <?= $user->first_name ?? '' ?> <?= $user->last_name ?? '' ?></h5>

                                        <?php } ?>
                                    </div> <!-- img-wrap.// -->
                                    <figcaption class="info-wrap">
                                        <div class="fix-height">
                                            <a href="#" class="title address"><?= $sear->occupication ?? '(Address Not Entred)' ?></a>
                                            <!-- price-wrap.// -->
                                        </div>
                                    </figcaption>
                                    <div class="card-footer">
                                        <a href="<?= \yii\helpers\Url::to(['/site/user-profile', 'id' => $user->id]) ?>" class="btn btn-primary btn-ng">View Profile </a>
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