<?php
/* @var $this \yii\web\View */

use app\models\User;
use app\modules\admin\models\base\UserDetail;

$this->title = 'Dashboard';
$this->params['subheading'] = '';
?>
<?php
$totolUsers = User::find()->where(['user_role' => User::ROLE_USER])->count();
$male = UserDetail::find()->where(['gender' => UserDetail::MALE])->count();
$female = UserDetail::find()->where(['gender' => UserDetail::FEMALE])->count();
$totolActiveUsers = User::find()->where(['user_role' => User::ROLE_USER])->andWhere(['status' => User::STATUS_ACTIVE])->count();

?>

<div class="row">
	<div class="col-lg-3 col-6">

		<div class="small-box bg-info">
			<div class="inner">
				<h3><?= $totolUsers ?></h3>
				<p>Total Users</p>
			</div>
			<div class="icon">
				<i class="fas fa-user"></i>
			</div>

		</div>
	</div>
	<div class="col-lg-3 col-6">

		<div class="small-box bg-danger">
			<div class="inner">
				<h3><?= $totolActiveUsers ?></h3>
				<p>Total Active Users</p>
			</div>
			<div class="icon">
				<i class="fas fa-chart-pie"></i>
			</div>

		</div>
	</div>

	<div class="col-lg-3 col-6">

		<div class="small-box bg-success">
			<div class="inner">
				<h3><?= $male ?></h3>
				<p>Male</p>
			</div>
			<div class="icon">
				<i class="fas fa-male"></i>
			</div>

		</div>
	</div>

	<div class="col-lg-3 col-6">

		<div class="small-box bg-warning">
			<div class="inner">
				<h3 class="text-white"><?= $female ?></h3>
				<p class="text-white">Female</p>
			</div>
			<div class="icon">
				<i class="fas fa-female"></i>
			</div>

		</div>
	</div>



</div>