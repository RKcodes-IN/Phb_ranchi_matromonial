<?php

namespace app\modules\admin\controllers;
use yii;
use app\models\User;

class DashboardController extends Controller
{
	/**
	 * @inheritdoc
	 */
	public function actions()
	{
		return [
			'error'   => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

	/**
	 * Displays dashboard with some statistics.
	 *
	 * @return string
	 */
	public function actionIndex()
	{
	$total_subadmin = User::find()->where(['status' => User::STATUS_ACTIVE])->andWhere(['user_role' => User::ROLE_SUBADMIN])->count();
	$total_manager= User::find()->where(['status' => User::STATUS_ACTIVE])->andWhere(['user_role' => User::ROLE_MANAGER])->count();
	$total_users = User::find()->where(['status' => User::STATUS_ACTIVE])->andWhere(['user_role' => User::ROLE_USER])->count();
	
		return $this->render('index',['total_users' => $total_users,
		'total_subadmin' => $total_subadmin,
		'total_manager' => $total_manager


		]);
	}
}