<?php

/* @var $this \yii\web\View */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\models\User;
use justcoded\yii2\rbac\models\Item as RbacItem;

?>
<style>
	.header-bg{
		background-color: #ff6f01;;
	}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<?php if(\Yii::$app->user->identity->user_role??'' == User::ROLE_USER){ ?>
<nav class="navbar navbar-dark navbar-expand-sm header-bg">
  <a class="navbar-brand" href="#">
    <img src="http://phbranchi.com/assets/images/logo-phb.png" width="60" height="60" alt="logo">
   <b> Punjabi Hindu Biradri Matromonial</b>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbar-list-4">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle mr-5" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="40" height="40" class="rounded-circle">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?= \yii\helpers\Url::to(['/site/my-profile','id'=>\Yii::$app->user->identity->id]) ?>">My Profile</a>
          <a class="dropdown-item" href="<?= \yii\helpers\Url::to(['/site/edit-profile','id'=>\Yii::$app->user->identity->id]) ?>">Edit Profile</a>
          <a class="dropdown-item" href="<?= \yii\helpers\Url::to(['/site/logout']) ?>">Log Out</a>
        </div>
      </li>   
    </ul>
  </div>
</nav>
<?php } ?> 
<?php
// NavBar::end();


