<?php
use yii\helpers\Html;
use app\widgets\FlashAlert;
use lo\modules\noty\Wrapper;
use app\modules\admin\assets\AssetBundle;
use kingston\mdbootstrap\MDBootstrapAsset;
use kingston\mdbootstrap\MDBootstrapPluginAsset;
use app\modules\admin\models\WebSetting;


/* @var $this \yii\web\View */
/* @var $content string */

AssetBundle::register($this);
MDBootstrapAsset::register($this);
MDBootstrapPluginAsset::register($this);

$adminlteAssets = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
$setting = new WebSetting();

$icon = $setting->getSettingBykey('website_favicon');

$this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="<?= Yii::$app->charset ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<link rel="icon" href="<?= Yii::$app->getUrlManager()->getBaseUrl() ?>/uploads/<?php echo $icon;?>" type="image/x-icon">

	<?php $this->head() ?>
	<!-- <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
	
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
</head>
<style>
.content-wrapper{
	background: #f0f0fa;
}
.card{
	background-color: #fff!important;
	-webkit-box-shadow: 0 1px 6px 1px rgba(69,65,78, 0.1);
    -moz-box-shadow: 0 1px 6px 1px rgba(69,65,78,0.1);
    box-shadow: 0 1px 6px 1px rgba(69,65,78,0.1);
}
a{
	color: #ff0018;
}
.nav-pills .nav-link:not(.active):hover{
	color: #ff0018;
}
.nav-pills .nav-link.active, .nav-pills .show > .nav-link{
	color: #ffffff;
    background-color: #ff0018!important;
}
.bg-light, .bg-light a {
    color: #f8f9fa !important;
}
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<?php $this->beginBody() ?>

<div class="wrapper">

	<?= $this->render('../partials/header', ['adminlteAssets' => $adminlteAssets]); ?>

	<?= $this->render('../partials/nav', ['adminlteAssets' => $adminlteAssets]); ?>

	<div class="content-wrapper">
		<?= $this->render('../partials/content-header'); ?>

		<section class="content">
			<div class="container-fluid" id='flash'>
				<?= FlashAlert::widget() ?>
			
				<?= $content ?>
				<br>
			</div>
		</section>
	</div>
	<script>
$('button[type="reset"]').click(function(){
    window.location.href = window.location.href.split('?')[0];
});
</script>
	<?= $this->render('../partials/footer'); ?>
</div>
<!-- ./wrapper -->

<?php $this->endBody() ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>
</html>
<?php $this->endPage() ?>
