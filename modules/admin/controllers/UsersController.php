<?php

namespace app\modules\admin\controllers;

use app\models\User;
use app\modules\admin\forms\UserForm;
use app\modules\admin\models\base\CashbackTransaction;
use app\modules\admin\models\UserSearch;
use app\traits\controllers\FindModelOrFail;
use Yii;
use yii\filters\VerbFilter;
use yii\base\Response;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;

/**
 * UsersController implements the CRUD actions for User model.
 */
class UsersController extends Controller
{
	use FindModelOrFail;
	
	/**
	 * @inheritdoc
	 */
	public function init()
	{
		parent::init();
		$this->modelClass = UserForm::class;
	}
	
	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			'verbs' => [
				'class'   => VerbFilter::class,
				'actions' => [
					'delete' => ['POST'],
				],
			],
		];
	}
	
	 //start now change status

	 public function actionStatusChange()
	 {
		$post = \Yii::$app->request->post ();	
	   
		if (! empty ( $post ['id'] )) {
			
			$transaction = User::find()->where(['id' =>  $post['id']])->one();
		if (! empty ( $transaction )) {
				
				$transaction->status = $post ['val'];           
				
				if($transaction->update (false)){
					return true;
	
			   }
			   else{
				   return false;
			   }
			}else{
				return false;
			}
		}		
	 }
 
 ///end now change status




	/**
	 * Lists all User models.
	 *
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new UserSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams,User::ROLE_USER);
		return $this->render('index', [
			'searchModel'  => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionSubAdmin(){
		$searchModel = new UserSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams,User::ROLE_SUBADMIN);
		return $this->render('index', [
			'searchModel'  => $searchModel,
			'dataProvider' => $dataProvider,
		]);

	}

	public function actionManagers(){
		$searchModel = new UserSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams,User::ROLE_VENDOR);
		return $this->render('index', [
			'searchModel'  => $searchModel,
			'dataProvider' => $dataProvider,
		]);

	}
	public function actionRefererList($id) {
		$searchModel = new UserSearch ();
		\Yii::$app->view->title = "Referal List";
		$dataProvider = $searchModel->usersearch ( Yii::$app->request->queryParams, $id );
		return $this->render ( 'index', [ 
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider 
		] );
	}
	
	/**
	 * Creates a new User model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 *
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new UserForm();
		$model->on(User::EVENT_BEFORE_INSERT, [$model, 'generateAuthKey']);
		
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
            \Yii::$app->end();
        }
		if ($model->load(Yii::$app->request->post())) {
			if($model->save()){
				return $this->redirect([ 'view','id' => $model->id ]);
				//return $this->redirect(['update', 'id' => $model->id]);
			}else{
				print_r($model->getErrors()); exit;
			}
			
		}	
		return $this->render('create', [
			'model' => $model,
		]);
	}

	
	/**
	 * Updates an existing User model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		/**
		 * @var UserForm $model
		 */
		$model = $this->findModel($id);	
		if ($model->load(Yii::$app->request->post())) {	
			if($model->save()){
				//return $this->redirect(['update', 'id' => $model->id]);
				return $this->redirect([ 'view','id' => $model->id ]);
			}else{
				print_r($model->getErrors()); exit;
			}	
		}
		return $this->render('update', [
			'model' => $model,
		]);     
	}
	public function actionView($id) {
		//'model' => $this->findModel ( $id ),
		$model = User::find()->where(['id' => $id])->one();
		return $this->render('view_old',['model' => $model]);
	/*	$available_cash = CashbackTransaction::getAvailableCashback( $id );
		$withdraw_cash = CashbackTransaction::getWithdrawCashback( $id );
		$pending_cash = CashbackTransaction::getPendingCashback ( $id );
		$approved_cash = CashbackTransaction::getApprovedCashback ( $id );
		$requested_cash = CashbackTransaction::getRequestedCashback ( $id );
		$paid_cash = CashbackTransaction::getPaidCashback ( $id );
		$clicks = ClickHistory::getClicks( $id );
		$cashback_activity_query = CashbackTransaction::find ()->Where ( [ 
				'user_id' => $id 
		] );
		$cashback_activity = new ActiveDataProvider ( [ 
				
				'query' => $cashback_activity_query 
		
		] );
		$userQuery = User::find ()->where ( [ 
				'referal_id' => $id 
		] );
		
		$dataProvider = new ActiveDataProvider ( [ 
				'query' => $userQuery 
		] );
		$searchModel = new UserSearch();
		$user_dataProvider = $searchModel->usersearch(Yii::$app->request->queryParams,$id);
		$referral_list = $searchModel->usersearch( Yii::$app->request->queryParams,$id);
		return $this->render('view_new', [ 
				'model' => $model,
				'pending_cash' => $pending_cash,
				'approved_cash' => $approved_cash,
				'requested_cash' => $requested_cash,
				'paid_cash' => $paid_cash,
				'withdraw_cash' => $withdraw_cash,
				'available_cash' => $available_cash,
				'clicks' => $clicks,
				'cashback_activity' => $cashback_activity,
				'dataProvider' => $dataProvider,
				'referral_list' => $referral_list,
				'userQuery' => $userQuery,
				'searchModel' => $searchModel,
				'user_dataProvider' => $user_dataProvider
		]);*/
	}

	public function actionChangeTransactionStatus() {
		$post = \Yii::$app->request->post ();
		
		if (! empty ( $post ['id'] ) && ! empty ( $post ['val'] )) {
			
			$transaction = CashbackTransaction::find()->where(['transaction_id' =>  $post ['id']])->one();
//var_dump($transaction); exit;
			$user_id = CashbackTransaction::find()->where(['parent_trans_id' =>$post ['id'] ])->all();
			if (! empty ( $transaction )) {
				if(!empty($user_id)){
					foreach($user_id as $user){
						$user->payment_status = $post ['val'];
						$user->update();
					}
				}
				$transaction->payment_status = $post ['val'];
				$transaction->updated_date = date('Y-m-d');
				$transaction->payment_status = $post ['val'];
				if($transaction->update ()){
					return true;
	
			   }
			   else{
				   return false;
			   }
			}else{
				return false;
			}
			
			
		}
	}
	
	
	/**
	 * Deletes an existing User model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		
		return $this->redirect(['index']);
	}
	public function actionUpdateStatus(){
		$data =[];
		$post = \Yii::$app->request->post();
		\Yii::$app->response->format = 'json';
		if (! empty ( $post ['id'] ) ) {
			$model = User::find()->where([
				'id' => $post['id'],
			])->one();
			if(!empty($model)){

                $model->status = $post['val'];      
			}
			if($model->save(false)){
				$data['message'] = "Updated";
                $data['id'] = $model->status ;
			}else{
				$data['message'] = "Not Updated";
                
			}

	}
	return $data;
}
}
