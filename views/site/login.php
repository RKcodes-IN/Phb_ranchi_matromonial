<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model app\forms\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
	.half,
	.half .container>.row {
		height: 100vh;
		min-height: 700px;
	}

	@media (max-width: 991.98px) {
		.half .bg {
			height: 200px;
		}
	}

	.half .contents {
		background: #f6f7fc;
	}

	.half .contents,
	.half .bg {
		width: 50%;
	}

	@media (max-width: 1199.98px) {

		.half .contents,
		.half .bg {
			width: 100%;
		}
	}

	.half .contents .form-control,
	.half .bg .form-control {
		border: none;
		-webkit-box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
		box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
		border-radius: 4px;
		height: 54px;
		background: #fff;
	}

	.half .contents .form-control:active,
	.half .contents .form-control:focus,
	.half .bg .form-control:active,
	.half .bg .form-control:focus {
		outline: none;
		-webkit-box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
		box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);
	}

	.half .bg {
		background-size: cover;
		background-position: center;
	}

	.half a {
		color: #888;
		text-decoration: underline;
	}

	.half .btn {
		height: 54px;
		padding-left: 30px;
		padding-right: 30px;
	}

	.half .forgot-pass {
		position: relative;
		top: 2px;
		font-size: 14px;
	}

	.control {
		display: block;
		position: relative;
		padding-left: 30px;
		margin-bottom: 15px;
		cursor: pointer;
		font-size: 14px;
	}

	.control .caption {
		position: relative;
		top: .2rem;
		color: #888;
	}

	.control input {
		position: absolute;
		z-index: -1;
		opacity: 0;
	}

	.control__indicator {
		position: absolute;
		top: 2px;
		left: 0;
		height: 20px;
		width: 20px;
		background: #e6e6e6;
		border-radius: 4px;
	}

	.control--radio .control__indicator {
		border-radius: 50%;
	}

	.control:hover input~.control__indicator,
	.control input:focus~.control__indicator {
		background: #ccc;
	}

	.control input:checked~.control__indicator {
		background: #fb771a;
	}

	.control:hover input:not([disabled]):checked~.control__indicator,
	.control input:checked:focus~.control__indicator {
		background: #fb8633;
	}

	.control input:disabled~.control__indicator {
		background: #e6e6e6;
		opacity: 0.9;
		pointer-events: none;
	}

	.control__indicator:after {
		font-family: 'icomoon';
		content: '\e5ca';
		position: absolute;
		display: none;
		font-size: 16px;
		-webkit-transition: .3s all ease;
		-o-transition: .3s all ease;
		transition: .3s all ease;
	}

	.control input:checked~.control__indicator:after {
		display: block;
		color: #fff;
	}

	.control--checkbox .control__indicator:after {
		top: 50%;
		left: 50%;
		margin-top: -1px;
		-webkit-transform: translate(-50%, -50%);
		-ms-transform: translate(-50%, -50%);
		transform: translate(-50%, -50%);
	}

	.control--checkbox input:disabled~.control__indicator:after {
		border-color: #7b7b7b;
	}

	.control--checkbox input:disabled:checked~.control__indicator {
		background-color: #7e0cf5;
		opacity: .2;
	}

	.nav-link{
		padding: 0 !important;
	}
</style>

<div class="d-lg-flex half">
	<div class="bg order-1 order-md-2" style="background-image: url('https://ik.imagekit.io/phbranchi/authentic-indian-bride-groom-s-hands-holding-together-traditional-wedding-attire__4__vTUC7_ZUpw.jpg?ik-sdk-version=javascript-1.4.3&updatedAt=1662582998045');"></div>
	<div class="contents order-2 order-md-1">

		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-md-7">
					<img src="https://ik.imagekit.io/phbranchi/logo-phb_KXBFIqpF8.png?ik-sdk-version=javascript-1.4.3&updatedAt=1662583171766" alt="" width="150">
					<h3>Login to <strong>PHB Ranchi Matromonial</strong></h3>
					<?php $form = ActiveForm::begin([
						'id' => 'login-form',
					]); ?>

					<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

					<?= $form->field($model, 'password')->passwordInput() ?>

					<?= $form->field($model, 'rememberMe')->checkbox() ?>

					<div class="form-group">
						<?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
					</div>
				

					<?php ActiveForm::end(); ?>

<b>Note:</b> For registration please contact to Punjabi Hindu Biradari Office,Ranchi.
				</div>
			</div>
		</div>
	</div>


</div>

