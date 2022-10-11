<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\forms\LoginForm;
use app\forms\ContactForm;
use app\models\User;
use app\modules\admin\models\Page;
use yii\data\ActiveDataProvider;
use yii\widgets\ActiveForm;
use app\modules\admin\models\WebSetting;
use app\modules\admin\forms\UserForm;
use app\modules\admin\models\Notification;
use app\modules\admin\models\UserSearch;
use app\modules\admin\models\EmailTemplate;
use yii\web\UploadedFile;
use app\components\AuthHandler;
use app\modules\admin\models\Auth;
use app\modules\admin\models\base\UserSibling;
use app\modules\admin\models\UserDetail;
use yii\helpers\Url;

class SiteController extends Controller
{
	public $successUrl = "success";
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'actions' => [
							'error',
							'index',
							'home',
							'login',
							'logout',
							'user-login',
							'my-profile',
							'user-profile',
							'edit-profile',
							'update-pro',

						],
						'allow' => true,
						'roles' => [
							'?',
						],
					],
					[
						'actions' => [
							'error',
							'index',
							'home',
							'login',
							'logout',
							'user-login',
							'my-profile',
							'user-profile',
							'edit-profile',
							'update-pro',
						],
						'allow' => true,
						'roles' => [
							'@',
						],
					],

				],
				/*'denyCallback' => function ($rule, $action) {
            throw new \Exception('Sorry Page Not Found');
            },*/
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'logout' => [
						'post'
					]
				]
			]
		];
	}
	/**
	 * Displays Errors.
	 *
	 * @return string
	 */
	public function actionError()
	{
		$app = Yii::app();
		if ($error = $app->errorHandler->error->code) {
			if ($app->request->isAjaxRequest) {
				echo $error['message'];
			} else {
				//$this->layout = 'doRedirect';
				$this->render('error' . ($this->getViewFile('error' . $error) ? $error : ''), $error);
			}
		}
	}

	/**
	 * @inheritdoc
	 */
	public function actions()
	{
		return [
			'error'   => [
				'class' => 'yii\web\ErrorAction',
			],
			'captcha' => [
				'class'           => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
			'auth' => [
				'class' => 'yii\authclient\AuthAction',
				'successCallback' => [$this, 'successCallback'],
			],

		];
	}

	public function successCallback($client)
	{
		// get user data from client
		var_dump($client);
		exit;
		$userAttributes = $client->getUserAttributes();


		$user = User::find()->where(['email' => $userAttributes['email']])->one();
		if (!empty($user)) {
			Yii::$app->user->login($user);
		} else {
			$session = Yii::$app->session;
			$session['attribute'] = $userAttributes;
			$this->successUrl = Url::to(['signin']);
		}
		die(print_r($userAttributes));
		// do some thing with user data. for example with $userAttributes['email']
	}
	public function actionTestMail()
	{
		$mail =    Yii::$app->mailer->compose()
			->setFrom('support@getcashback.co.in')
			->setTo('sri.srinadh555@gmail.com')
			->setSubject('Email sent from Yii2-Swiftmailer')
			->send();
		print_r($mail);
		exit;
	}

	/**
	 * Displays homepage.
	 *
	 * @return string
	 */
	public function actionIndex()
	{
		if (!User::isAdmin()) {

			return $this->redirect('/Phb_ranchi_matromonial/site/login');
		}
		if (User::isUser()) {
		}

		if (\Yii::$app->user->identity->user_role == User::ROLE_ADMIN) {
			return $this->redirect(['/admin/dashboard']);
		}
		if (\Yii::$app->user->identity->user_role == User::ROLE_USER) {
			return $this->redirect(['about']);
		}
	}

	/**
	 * Displays contact page.
	 *
	 * @return Response|string
	 */
	public function actionContact()
	{
		$model = new ContactForm();
		if ($model->load(Yii::$app->request->post()) && $model->contact()) {
			Yii::$app->session->setFlash('contactFormSubmitted');

			return $this->refresh();
		}

		return $this->render('contact', [
			'model' => $model,
		]);
	}

	public function actionEditProfile($id)
	{
		$model = UserDetail::find()->where(['user_id' => $id])->one();
		$user = User::find()->where(['id' => $model->user_id])->one();
		$oldImage = $model['profile_image'];
		if ($user->load(Yii::$app->request->post())) {

			if ($user->save(false)) {
				$model->load(Yii::$app->request->post());
				$upload_image = \yii\web\UploadedFile::getInstance($model, 'profile_image');
				if (!empty($upload_image)) {


					$image = Yii::$app->notification->imageKitUpload($upload_image);

					$model->profile_image = $image['url'];
				} else {
					$model->profile_image = $oldImage;
				}
				if ($model->save(false)) {
					return $this->redirect(['update-pro', 'id' => $model->id]);
				}
			} else {
				print_r('Not Updated');
			}

			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('edit-profile', [
				'model' => $model,
				'user' => $user,
			]);
		}
	}
	/**
	 * Displays about page.
	 *
	 * @return string
	 */
	public function actionAbout()
	{
		$model = Page::find()->where(['type_id' => Page::TYPE_ABOUT])->one();
		return $this->render('front_page', ['model' => $model]);
	}


	public function actionUserLogin()
	{
		$loginUser = User::find()->where(['id' => \Yii::$app->user->identity->id])->one();
		$userDetail = UserDetail::find()->where(['user_id' => $loginUser->id])->andWhere(['status' => UserDetail::STATUS_ACTIVE])->one();
		if ($userDetail->gender == UserDetail::MALE) {
			$users = User::find()->joinWith(['userDetail as ud'])->where(['user.status' => User::STATUS_ACTIVE])->andWhere(['user.user_role' => User::ROLE_USER])
				->andWhere(['ud.gender' => UserDetail::FEMALE])->all();
		} else if ($userDetail->gender == UserDetail::FEMALE) {
			$users = User::find()->joinWith(['userDetail as ud'])->where(['user.status' => User::STATUS_ACTIVE])->andWhere(['user.user_role' => User::ROLE_USER])
				->andWhere(['ud.gender' => UserDetail::MALE])->all();
		}
		return $this->render('index', ['users' => $users]);
	}


	/**
	 * Logout action.
	 *
	 * @return Response
	 */
	public function actionLogout()
	{
		Yii::$app->user->logout();
		$this->redirect(Yii::$app->homeUrl);
	}


	public function actionLogin()
	{

		if (!Yii::$app->user->isGuest) {
			return	$this->redirect('index');
		}
		$model = new LoginForm();
		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
			return ActiveForm::validate($model);
			\Yii::$app->end();
		}
		if ($model->load(Yii::$app->request->post())) {
			$user_verification = User::find()->where(['username' => $model['username']])->orWhere(['email' => $model['username']])->one();
			//var_dump( $user_verification); exit;
			//if($user_verification['status'] == User::STATUS_ACTIVE){
			if ($model->login()) {

				if (\Yii::$app->user->identity->user_role == User::ROLE_ADMIN) {
					return $this->redirect(['']);
				}
				if (\Yii::$app->user->identity->user_role == User::ROLE_USER) {


					return $this->redirect(['site/user-login']);
				}

				return $this->goBack();
			}
			/*}else{
                Yii::$app->session->setFlash('error','Please Activate Your  Account');
            }*/
		}
		return $this->render('login', ['model' => $model]);
	}



	public function actionAdminLogin()
	{
		//$this->layout = '//main-login';
		if (!Yii::$app->user->isGuest) {
			return $this->goHome();
		}

		$model = new LoginForm();
		if ($model->load(Yii::$app->request->post())) {
			if ($model->login()) {
				if (\Yii::$app->user->identity->user_role == User::ROLE_ADMIN) {
					return $this->redirect(['/admin/dashboard']);
				}
				if (\Yii::$app->user->identity->user_role == User::ROLE_USER) {


					return $this->render('index');
				}
				return $this->goBack();
			}
		}
		return $this->render('/site/admin-login', [
			'model' => $model
		]);
	}

	public function actionMyProfile($id)
	{
		$user = User::find()->where(['id' => $id])->one();
		$userDetail = UserDetail::find()->where(['user_id' => $user->id])->one();
		return $this->render('myprofile', [
			'user' => $user,
			'userDetail' => $userDetail
		]);
	}

	public function actionUpdatePro($id)
	{
		$user = User::find()->where(['id' => $id])->one();
		$userDetail = UserDetail::find()->where(['user_id' => $user->id])->one();
		return $this->render('updateprofile', [
			'user' => $user,
			'userDetail' => $userDetail
		]);
	}

	public function actionUserProfile($id)
	{

		$user = User::find()->where(['id' => $id])->andWhere(['status' => User::STATUS_ACTIVE])->one();
		$userDetail = UserDetail::find()->where(['user_id' => $user->id])->andWhere(['status' => UserDetail::STATUS_ACTIVE])->one();
		return $this->render('user-profile', [
			'user' => $user,
			'userDetail' => $userDetail
		]);
	}
}
