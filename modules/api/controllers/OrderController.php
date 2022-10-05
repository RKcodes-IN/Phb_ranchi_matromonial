<?php
namespace app\modules\api\controllers;
use yii;
use app\modules\api\controllers\BKController;
use yii\filters\AccessControl;
use app\components\DrivingDistance;
use yii\filters\AccessRule;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Banner;
use app\modules\admin\models\Temples;
use app\modules\admin\models\Category;
use app\components\AuthSettings;
use app\modules\admin\models\PujaServices;
use app\modules\admin\models\Cart;
use app\modules\admin\models\CartItems;
use app\modules\admin\models\WebSetting;
use app\modules\admin\models\Orders;

class OrderController extends BKController
{

    public function behaviors() {

		return ArrayHelper::merge ( parent::behaviors (), [ 

				'access' => [ 
						'class' => AccessControl::className (),
						'ruleConfig' => [ 

								'class' => AccessRule::className () 
						],
						'rules' => [ 
								[ 

										'actions' => [ 
												'index',
												'cash-mode',
												'my-orders',
												'order-details',
										],

										'allow' => true,
										'roles' => [ 

												'@' 
										] 
								],

								[ 
										'actions' => [ 
												'index',
                                                'cash-mode',
												'my-orders',
												'order-details',
											
										],

										'allow' => true,

										'roles' => [ 

												'?',
												'*',
												//'@' 
										] 

								] 

						] 

				] 

		] );

	}

    public function actionIndex()
    {
		echo 'dsdsadsa';
        return $this->render('index');
	}

    public function actionCashMode(){
		$data = [];
        $post = Yii::$app->request->post();
        $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
        $auth = new AuthSettings();
        $user_id = $auth->getAuthSession($headers);
        if (!empty($user_id)) {
            $cartId = $post['cart_id'];
			$familyMembers = $post['family_members'];
            $userId = $user_id;
            $cart = Cart::find()->where(['id' => $cartId])->one();
            if (!empty($cart)) {
				$order = (new Orders())->saveOrderByCart($cartId, Orders::TYPE_COD, $userId,$familyMembers);
				if (!empty($order)) {
				$cartItems = CartItems::find()->where(['cart_id' => $cartId])->all();
				if (!empty($cartItems)) {
				foreach ($cartItems as $cartItem) {
					$cartItem->delete();
				}
			}
			$cart = Cart::findOne(["id" => $cartId]);
			if (!empty($cart)) {
				$cart->delete();
			}
		  
			$data['status'] = self::API_OK;
			$data['details'] = $order->asJson();

		} else {
			$data['status'] = self::API_NOK;
			$data['error'] = \Yii::t('app',"Order failed to save");
		}

			}else{
                $data['status'] = self::API_NOK;
                $data['error'] = \Yii::t('app', "No order found with this Cart id"); 
            }
        } else {
            $data['status'] = self::API_NOK;
            $data['error'] = \Yii::t('app', "Invalid AuthCode");
        }
        return $this->sendJsonResponse($data);  
    }

	public function actionMyOrders()
    {
        $data = [];
        $post = Yii::$app->request->post();
        $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
        $auth = new AuthSettings();
        $user_id = $auth->getAuthSession($headers);
        $page = isset($post['page']) ? $post['page'] : 0;
        if (!empty($user_id)) {
            if (!empty($post)) {
                $status = isset($post['status']) ? $post['status'] : 0;
                $query = Orders::find()->Where(['user_id' => $user_id])
                    ->andWhere(['status' => $status]);

            } else {
                $query = Orders::find()->Where(['user_id' => $user_id]);

            }
            $newOrders = new ActiveDataProvider([
                'query' => $query,
                'sort' => [
                    'defaultOrder' => [
                        'id' => SORT_DESC,
                    ],
                ],
                'pagination' => [
                    'pageSize' => 20,
                    'page' => $page,
                ],
            ]);
// echo $newOrders->createCommand()->getRawSql();exit;
           
            foreach ($newOrders->models as $order) {
                    $list [] = $order->asJson();
                }
			if (!empty($order)) {
				$data['status'] = self::API_OK;
                $data['details'] = $list;
            }else{
				$data['status'] = self::API_NOK;
            	$data['error'] = Yii::t("app"," No order found");
			}

        } else {
            $data['status'] = self::API_NOK;
            $data['error'] = Yii::t("app"," No user found");
        }
        return $this->sendJsonResponse($data);
    }

	public function actionOrderDetails()
    {
        $data = [];
        $post = Yii::$app->request->post();
        $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
        $auth = new AuthSettings();
        $user_id = $auth->getAuthSession($headers);
        $order_id = $post['order_id'];
        if (!empty($user_id)) {
            $order = Orders::find()->Where(['user_id' => $user_id])
                ->andWhere(['id' => $order_id])
                ->one();
            // echo $query->createCommand()->getRawSql();exit;
            if (!empty($order)) {
                $data['status'] = self::API_OK;
                $data['details'] = $order->asJson();
            } else {
                $data['status'] = self::API_NOK;
                $data['error'] = Yii::t("app"," No Order found");
            }

        } else {
            $data['status'] = self::API_NOK;
            $data['error'] = Yii::t("app"," No user found");
        }
        return $this->sendJsonResponse($data);
    }


}