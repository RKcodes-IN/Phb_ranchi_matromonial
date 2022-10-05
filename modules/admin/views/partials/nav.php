<?php

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use app\modules\admin\widgets\Menu;

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-dark-info">
	<!-- Brand Logo -->
	<a href="<?= Yii::$app->homeUrl; ?>" class="brand-link">
		<span class="brand-image" style="opacity: .8; line-height: 1.8em">APP</span>
		<span class="brand-text font-weight-light"><?= Html::encode(Yii::$app->name); ?></span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<i class="fas fa-user-tie img-circle elevation-2"></i>
			</div>
			<div class="info flex-grow-1">
				<a href="#" class="d-block"><?= Html::encode(Yii::$app->user->identity->getShortName()) ?></a>
			</div>
			<div class="align-self-end">
				<?= Html::a(
					'<i class="fa fa-power-off"></i>',
					['/auth/logout'],
					[
						'title'       => 'Sign Out',
						'data-method' => 'post',
						'class'       => 'd-block',
						'style'       => 'line-height: 2em;',
					]
				); ?>
			</div>
		</div>
		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<?= Menu::widget([
				'options' => [
					'class' => 'nav nav-pills nav-sidebar flex-column',
					'data-widget' => 'treeview',
					'role'           => 'menu',
					'data-accordion' => 'false',
				],
				'items'   => [
					[
						'label' => 'Dashboard',
						'icon' => 'fas fa-tachometer-alt',
						'url' => ['/admin/dashboard'],
						'active' => 'dashboard' === Yii::$app->controller->id,
					],
					
					// [
					// 	'label' => 'Web Settings',
					// 	'icon'  => 'fas fa-cog',
					// 	'url'   => '#',
					// 	'items' => [
					// 		// [
					// 		// 	'label'  => 'Web Setting',
					// 		// 	'url'    => ['/admin/web-setting/cms'],
					// 		// 	'options'=>['class'=>'bold'],	
					// 		// ],
					// 		[
					// 			'label'  => 'Banners',
					// 			'url'    => ['/admin/banner'],
					// 			'options'=>['class'=>'bold'],	
					// 		],
						
					// 	],
					// ],
					[
						'label' => 'Users',
						'icon'   => 'fas fa-users',
						'url'   => '#',
						'items' => [
							/*[
								'label'  => 'SubAdmins',
								'url'    => ['/admin/users/sub-admin'],
								'options'=>['class'=>'bold'],	
							],*/
					
							[
								'label'  => 'Users Details',
								'url'    => ['/admin/user-detail'],
								'options'=>['class'=>'bold'],	
							],
						
						],
					],

			
					[
						'label' => 'Sibling Type',
						'icon' => 'fas fa-user',
						'url' => ['/admin/sibling-type'],
					],
			
			
					
					
				],
			]) ?>
		</nav>
	</div>

</aside>
