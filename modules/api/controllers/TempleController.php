<?php
namespace app\modules\api\controllers;
use yii;
use app\modules\api\controllers\BKController;
use yii\filters\AccessControl;
use app\components\DrivingDistance;
use yii\filters\AccessRule;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Banner;
use app\modules\admin\models\Temples;
use app\modules\admin\models\Category;
use app\components\AuthSettings;
use app\modules\admin\models\PujaServices;
use app\modules\admin\models\Cart;
use app\modules\admin\models\CartItems;
use app\modules\admin\models\Likes;
use yii\data\ActiveDataProvider;

class TempleController extends BKController
{

    public function behaviors() {

		return ArrayHelper::merge ( parent::behaviors (), [ 

			'corsFilter' => [
                'class' => \yii\filters\Cors::className(),
                'cors' => [
                    // restrict access to
                    'Origin' => ['http://localhost:*', 'http://localhost:58600'],
                    // Allow only POST and PUT methods
                    'Access-Control-Request-Method' => ['POST', 'PUT'],
                    // Allow only headers 'X-Wsse'
                    'Access-Control-Request-Headers' => ['X-Wsse'],
                    // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                    'Access-Control-Allow-Credentials' => true,
                    // Allow OPTIONS caching
                    'Access-Control-Max-Age' => 3600,
                    // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                    'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                ],
            ],

				'access' => [ 
						'class' => AccessControl::className (),
						'ruleConfig' => [ 

								'class' => AccessRule::className () 
						],
						'rules' => [ 
								[ 

										'actions' => [ 
												'index',
												'home',
												'banners',
												'category',
												'temple-details',
												'temple-timing',
												'temple-gallery',

												'temples-by-category',
												'temple-puja-services',
												'featured-temples',
												'add-to-cart',
												'my-cart',
												'delete-cart',


										],

										'allow' => true,
										'roles' => [ 

												'@' 
										] 
								],

								[ 
										'actions' => [ 
												'index',
												'home',	
												'banners',
												'category',
												'temple-details',
												'temple-timing',
												'temple-gallery',

												'temples-by-category',
												'temple-puja-services',
												'featured-temples',
												'add-to-cart',	
												'my-cart',
												'delete-cart'
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

	public function actionBanners(){
		$data = [];
        $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
        $auth = new AuthSettings();
        $user_id = $auth->getAuthSession($headers);

        if (!empty($user_id)) {
			/* Banners */
			$banners = Banner::find()->where(['status' => Banner::STATE_ACTIVE])->orderBy(['sort_order' => SORT_DESC ])->all();
			if (!empty($banners)) {
				foreach($banners as $banner){
					$list[] = $banner->asJson();
				}
				$data['status'] = self::API_OK;
				$data['details'] = $list;
			} else {
				$data['status'] = self::API_NOK;
				$data['error'] = "Data Not Found";
			}
		}else {
            $data['status'] = self::API_NOK;
            $data['error'] = "Invalid AuthCode";
        }
        return $this->sendJsonResponse($data);

	}
	public function actionCategory(){
		$data = [];
        $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
        $auth = new AuthSettings();
        $user_id = $auth->getAuthSession($headers);

        if (!empty($user_id)) {
			/* Categories */
			$categories = Category::find()->where(['status' =>Category::STATE_ACTIVE])->orderBy(['sortOrder' => SORT_DESC])->limit(5)->all();
			if (!empty($categories)) {
				foreach($categories as $category){
					$list[] = $category->asJson();
				}
				$data['status'] = self::API_OK;
				$data['details'] = $list;
			} else {
				$data['status'] = self::API_NOK;
				$data['error'] = "Data Not Found";
			}
		}else {
            $data['status'] = self::API_NOK;
            $data['error'] = "Invalid AuthCode";
        }
        return $this->sendJsonResponse($data);

	}

	public function actionFeaturedTemples(){
		$data = [];
		$d = [];
        $post = Yii::$app->request->post();
        $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
        $auth = new AuthSettings();
        $user_id = $auth->getAuthSession($headers);
        $temple = new Temples();
        $latitude = $post['lat'];
        $longitude = $post['lang'];
        $page = $post['page'];
        $page = isset($page) ? $page : '0';

        if (!empty($user_id)) {
			
			$getFeaturedTemples = $temple->getFeaturedTemples($latitude, $longitude, $page);

			if (!empty($getFeaturedTemples->models)) {
				$feature_result = [];
				foreach ($getFeaturedTemples->models as $af) {
					$alat = trim($af['lat']);
					$alang = trim($af['lng']);  
					$feature_list[] = $af->asJson($user_id,$latitude, $longitude);
					$feature_result = array_merge($feature_list);
				}

				if (!empty($feature_result)) {
					$d['temple_details'] = $feature_result;

					$data['status'] = self::API_OK;
					$data['details'] = $d;
					$data['logo_url'] = \Yii::$app->urlManager->createAbsoluteUrl('uploads') . '/temples/';
					
				}
			} else {
				$data['status'] = self::API_NOK;
				$data['error'] = "Data Not Found";
			}
		}else {
            $data['status'] = self::API_NOK;
            $data['error'] = "Invalid AuthCode";
        }
        return $this->sendJsonResponse($data);

	}

	public function actionHome(){
		$data = [];
		$d = [];
        $post = Yii::$app->request->post();
        $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
        $auth = new AuthSettings();
        $user_id = $auth->getAuthSession($headers);
        $temple = new Temples();
        $latitude = $post['lat'];
        $longitude = $post['lang'];
        $page = $post['page'];
        $page = isset($page) ? $page : '0';

        if (!empty($user_id)) {
			
			/*$getFeaturedTemples = $temple->getFeaturedTemples($latitude, $longitude, $page);

			if (!empty($getFeaturedTemples->models)) {
				$feature_result = [];
				foreach ($getFeaturedTemples->models as $af) {
					$alat = trim($af['lat']);
					$alang = trim($af['lng']);  
					$feature_list[] = $af->asJson($user_id,$latitude, $longitude);
					$feature_result = array_merge($feature_list);
				}

				if (!empty($feature_result)) {
					Yii::$app->session->setFlash('success', 'ajax success');
					$data['featured_temple_details'] = $feature_result;
					$data['logo_url'] = \Yii::$app->urlManager->createAbsoluteUrl('uploads') . '/temples/';
					
				}
			} else {
				$data['featured_temple_details'] = [];
			}*/

			$getNearByTemples = $temple->getNearByTemples($latitude, $longitude, $page);
			//   var_dump($getNearByRestaurant->models);exit;
			if (!empty($getNearByTemples->models)) {
				$result = [];
				foreach ($getNearByTemples->models as $a) {
					$alat = trim($a['lat']);
					$alang = trim($a['lng']);
					
					$list[] = $a->asJson($user_id,$latitude, $longitude);
					$result = array_merge($list);
				}

				if (!empty($result)) {
				
					$data['temple_details'] = $result;

					$data['logo_url'] = \Yii::$app->urlManager->createAbsoluteUrl('uploads') . '/temples/';
					
				}
			} else {
				$data['temple_details'] = [];
			}
			$d['status'] = self::API_OK;
            $d['details'] = $data;

		}else {
            $d['status'] = self::API_NOK;
            $d['error'] = "Invalid AuthCode";
        }
        return $this->sendJsonResponse($d);
	}

	public function actionTempleDetails(){
		$data = [];
        $post = Yii::$app->request->post();
        $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
        $auth = new AuthSettings();
        $user_id = $auth->getAuthSession($headers);
        $store = new Temples();
        $latitude = $post['lat'];
        $longitude = $post['lang'];
        $temple_id = $post['temple_id'];
        if (!empty($user_id)) {
			$templeDetails = Temples::find()->where(['id' => $temple_id])->andWhere(['status' => 1])->one();
		
			if (!empty($templeDetails)) {
                $driving_distance = new DrivingDistance();
				
                $dist = $driving_distance->getDrivingDistance($templeDetails['lat'],$templeDetails['lng'], $latitude, $longitude);
 
                if($dist['meters'] > $templeDetails['delivery_radius']) {
                    $data['status'] = self::API_OK;
                    $data ['message'] = "Cannot delivery to this location"; 
                    $data['distance'] = $dist;
                    $data['details'] = $templeDetails->templeJson($user_id,$latitude,$longitude);
                }
                else {
                    $data['status'] = self::API_OK;
                    $data ['message'] = "Great! Store will do delivery your location"; 
                    $data['distance'] = $dist;
                    $data['details'] = $templeDetails->templeJson($user_id,$latitude,$longitude);
                    
               }
               // $data['logo_url'] = \Yii::$app->urlManager->createAbsoluteUrl('uploads') . '/temples/';
            } else {
                $data['status'] = self::API_NOK;
                $data['error'] =  Yii::t("app", "No Temple Found"); 
            }

		}else{
			$data['status'] = self::API_NOK;
			$data['error'] = Yii::t("app", "User Not Found"); 
		}
		return $this->sendJsonResponse($data);
	}
	//Temple gallery
	public function actionTempleGallery(){
		$data = [];
        $post = Yii::$app->request->post();
        $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
        $auth = new AuthSettings();
        $user_id = $auth->getAuthSession($headers);
       
        $temple_id = $post['temple_id'];
        if (!empty($user_id)) {
			$templeDetails = Temples::find()->where(['id' => $temple_id])->andWhere(['status' => 1])->one();
		
			if (!empty($templeDetails)) {
                if($templeDetails->templeGalleries){
                    foreach($templeDetails->templeGalleries as $gallery){
                        $data['templeGalleries'][] = $gallery->asJson();
                    }
                }else{
					$data['status'] = self::API_NOK;
					$data['error'] =  Yii::t("app", "No Images found"); 
				}
              
            } else {
                $data['status'] = self::API_NOK;
                $data['error'] =  Yii::t("app", "No Temple Found"); 
            }

		}else{
			$data['status'] = self::API_NOK;
			$data['error'] = Yii::t("app", "User Not Found"); 
		}
		return $this->sendJsonResponse($data);
	}

	//Temple timings
		//Temple gallery
		public function actionTempleTiming(){
			$data = [];
			$post = Yii::$app->request->post();
			$headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
			$auth = new AuthSettings();
			$user_id = $auth->getAuthSession($headers);
		   
			$temple_id = $post['temple_id'];
			if (!empty($user_id)) {
				$templeDetails = Temples::find()->where(['id' => $temple_id])->andWhere(['status' => 1])->one();
			
				if (!empty($templeDetails)) {
					if($templeDetails->templeTimings){
						foreach($templeDetails->templeTimings as $templeTimings){
							$data['templeTimings'][] = $templeTimings->asJson();
						}
					}else{
						$data['status'] = self::API_NOK;
						$data['error'] =  Yii::t("app", "No Images found"); 
					}
				  
				} else {
					$data['status'] = self::API_NOK;
					$data['error'] =  Yii::t("app", "No Temple Found"); 
				}
	
			}else{
				$data['status'] = self::API_NOK;
				$data['error'] = Yii::t("app", "User Not Found"); 
			}
			return $this->sendJsonResponse($data);
		}

		public function actionAddLikes()
		{
			$data = [];
			$post = Yii::$app->request->post();
			$headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
			$auth = new AuthSettings();
			$user_id = $auth->getAuthSession($headers);
			if (!empty($user_id)) {
				if (!empty($post)) {
					$model = new Likes();
					// var_dump($likes); exit;
					$like_exist = Likes::find()->where(['user_id' => $user_id])->andWhere(['news_id' => $post['post_id']])->one();
					if (empty($like_exist)) {
						$model->user_id = $user_id;
						$model->temple_id = $post['temple_id'];
						$model->type_id = 1;
						if ($model->save(false)) {
							$likes = $model::getCount($post['temple_id']);
							$d['message'] = Yii::t("app", "Data Saved");
							$d['likes_count'] = $likes;
							$data['status'] = SELF::API_OK;
							$data['details'] = $d;
						} else {
							$data['status'] = SELF::API_NOK;
							$data['error'] = Yii::t("app", "Something Went Wrong");
						}
					} else {
						if ($like_exist->delete()) {
							$likes = $model::getCount($post['post_id']);
							$d['message'] = Yii::t("app", "Data Deleted");
							$d['likes_count'] = $likes;
							$data['status'] = SELF::API_OK;
							$data['details'] = $d;
						} else {
							$data['status'] = SELF::API_OK;
							$data['error'] = Yii::t("app", "Data Not Deleted");
						}
					}
				} else {
					$data['status'] = SELF::API_NOK;
					$data['error'] = Yii::t("app", "Data Not Posted");
				}
			} else {
				$data['status'] = SELF::API_NOK;
				$data['error'] = Yii::t("app", "User Not Found");
			}
	
			return $this->sendJsonResponse($data);
		}
	public function actionTemplesByCategory(){

		$d = [];
        $data = [];
        $post = Yii::$app->request->post();
        $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
        $auth = new AuthSettings();
        $user_id = $auth->getAuthSession($headers);
        $temple = new Temples();
        $latitude = $post['lat'];
        $longitude = $post['lang'];
        $page = $post['page'];
        $category_id = $post['category_id'];
        $page = isset($page) ? $page : '0';
    
        if (!empty($user_id)) {

            $getTemples = $temple->getTemplesByCat($latitude, $longitude, $page, $category_id);
            if (!empty($getTemples)) {
                foreach ($getTemples->models as $a) {
                    $alat = trim($a['lat']);
                    $alang = trim($a['lng']);
                    $list[] = $a->asJson($latitude,$longitude);
                   
                    $result = array_merge($list);
                }
                if (!empty($result)) {
                    $data['status'] = self::API_OK;
                    $data['details'] = $result;
                    $data['logo_url'] = \Yii::$app->urlManager->createAbsoluteUrl('uploads') . '/temples/';
                   // $data['featured_logo_url'] = \Yii::$app->urlManager->createAbsoluteUrl('uploads') . '/stores/';
                } else {
                    $data['status'] = self::API_NOK;
                    $data['error'] = "Not Found";

                }
            }
        } else {
            $data['status'] = self::API_NOK;
            $data['error'] = "Invalid AuthCode";
        }
        return $this->sendJsonResponse($data);

	}

	public function actionTemplePujaServices(){
		$data = [];
		$post = Yii::$app->request->post();
		$headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
		$auth = new AuthSettings();
		$user_id = $auth->getAuthSession($headers);
		$temple = new Temples();
		$temple_id = $post['temple_id'];
		$search = isset($post['search'])?$post['search']:'';
		$page =  isset($post['page'])?$post['page']:0;
		if (!empty($user_id)) {
			$temple_services = Category::find()->joinWith(['templeCategories as tc'])->where(['tc.temple_id' => $temple_id])
			->andWhere(['category.status' => 1]);
			/*$temple_services = PujaServices::find()->where(['temple_id' => $temple_id])
			->andWhere(['status' => 1])->all();*/
			/*$temple_services = PujaServices::find()->joinWith('pujaServicesTypes')
			->where(['temple_id' => $temple_id])->andWhere(['puja_services.status' => 1])
			->andWhere(['puja_services_types.status' => 1])->all();*/
			$dataProvider = new ActiveDataProvider ( [ 
				'query' => $temple_services,
				'sort' => [ 
						'defaultOrder' => [ 
						    'id' => SORT_DESC 
						] 
				],
				'pagination' => array (
						'pageSize' =>10,
						'page' => $page
				) 
		] );
			
			foreach($dataProvider->models as $services){
					$list[] = $services->asJson();
			}
			if(!empty($list)){
				$data['status'] = self::API_OK;
				$data['details'] = $list;

			}else{
				$data['status'] = self::API_NOK;
            	$data['error'] = Yii::t("app","Services Not Found");
			}

		}else {
            $data['status'] = self::API_NOK;
            $data['error'] = Yii::t("app","Invalid AuthCode");
        }

		return $this->sendJsonResponse($data);
	}
	//Temple services Availability
	public function actionPujaServicesAvailability(){
		$data = [];
		$post = Yii::$app->request->post();
		$headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
		$auth = new AuthSettings();
		$user_id = $auth->getAuthSession($headers);
		$temple = new Temples();
		$pooja_service_id = $post['pooja_service_id'];
	
		if (!empty($user_id)) {
			$puja_service = PujaServices::find()->where(['id' => $pooja_service_id])->one();
			if(!empty($puja_service)){
				
			}else{
				$data['status'] = self::API_NOK;
            $data['error'] = Yii::t("app","No pooja service found");
			}
		}else{
			$data['status'] = self::API_NOK;
            $data['error'] = Yii::t("app","Invalid AuthCode");
		}
		return $this->sendJsonResponse($data);

	}
	public function actionAddToCart(){
		$data = [];
		$post = Yii::$app->request->post();
		$headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
		$auth = new AuthSettings();
		$user_id = $auth->getAuthSession($headers);
		
		if (!empty($user_id)) {
			if (!empty($post)) {
				$temple_id = $post['temple_id'];
		$category_id = $post['category_id'];
		$service_id = $post['service_id'];
		$service_date = $post['service_date'];
		$qty = $post['qty'];

				$service_exist = PujaServices::find()->where(['id' => $service_id])->one();
				//var_dump($service_exist); exit;
				if($service_exist["type_id"] == PujaServices::SPECIAL_PUJA){

					if($service_date == $service_exist['service_date']){
						$s_date = 	$service_date;
					}else{
						$data['status'] = self::API_NOK;
                        $data['error'] = \Yii::t('app', 'This Date Not Available');
                        return $this->sendJsonResponse($data);
					}
				}else{
					$s_date = 	$service_date;
				}
				// Check for cart quantuity 0
				$cartZero = Cart::find()->where(['user_id' => $user_id])->andWhere(['quantity' => 0])->one();
                if (!empty($cartZero)) {
                    $cartZero->delete();
                }

                $cartAlreadyExist = Cart::find()->where(['user_id' => $user_id])->andWhere(['!=', 'quantity', 0])->one();
                if (!empty($cartAlreadyExist)) {
                    if ($temple_id != $cartAlreadyExist->temple_id) {
                        $data['status'] = self::API_NOK;
                        $data['error'] = \Yii::t('app', 'You Can Not Order From Different Temple');
                        return $this->sendJsonResponse($data);
                    }
                }

				$cart = Cart::find()->where(['user_id' => $user_id])->andWhere(['temple_id' => $temple_id])->one();
				$puja_service = PujaServices::find()->where(['id' => $service_id])->andWhere(['category_id' => $category_id])->one();
				//var_dump($puja_service); exit;
				$amount = isset($puja_service->discount_price) ? $puja_service->discount_price : $puja_service->original_price;

				if (empty($cart)) {
                    //Get Product item and item size price

                    if (!empty($puja_service)) {
                        $cart = new Cart();
                        $cart->user_id = $user_id;
                        $cart->temple_id = $temple_id;
                        $cart->amount = $qty * $amount;
                        $cart->quantity = $qty;
						$cart->service_date = $s_date;
                        //Add Cart Calculations

                        if ($cart->save()) {
                            //Check whether cart item exist or not
                            $cartitem = CartItems::find()->Where([
                                'category_id' => $category_id,
                                'service_id' => $service_id,
                                'cart_id' => $cart->id,

                            ])->one();
                            if (!empty($cartitem)) {

                                $cartitem->quantity = $cartitem->quantity + $qty;

                                $cartitem->amount = $cartitem->amount + ($qty * $amount);
                                $cartitem->user_id = $user_id;
                                if (!$cartitem->save()) {
                                    print_r($cartitem->getErrors());
                                    exit();
                                }

                            } else {
                                $cartitem = new CartItems();
                                $cartitem->category_id = $category_id;
                                $cartitem->cart_id = $cart->id;
                                $cartitem->amount = $qty * $amount;
                                $cartitem->quantity = $qty;
                                $cartitem->service_id = $service_id;
                                $cartitem->user_id = $user_id;
                                if (!$cartitem->save()) {
                                    print_r($cartitem->getErrors());
                                    exit();
                                }
                            }
                            $data['status'] = self::API_OK;
                            $data['details'] = $cart;
                            $data['items'] = $cartitem;
                            $data['message'] = \Yii::t('app', 'Added to Cart');
                            return $this->sendJsonResponse($data);

                        } else {
                            $data['status'] = self::API_NOK;
                            $data['error'] = $cart->getErrors(); //\Yii::t('app', 'Cart unable to save');
                        }

                    } else {
                        $data['status'] = self::API_NOK;
                        $data['error'] = \Yii::t('app', 'Service Not found.Unable to add');
                    }

                } else{
				$cart->amount = $cart->amount + ($qty * $amount);
				$cart->quantity = $cart->quantity + $qty;
				$cart->user_id = $user_id;

				if ($cart->save(false)) {
					$cartitem = CartItems::find()->Where([
						'category_id' => $category_id,
						'service_id' => $service_id,
						'cart_id' => $cart->id,

					])->one();
					if (!empty($cartitem)) {
						$cartitem->quantity = $cartitem->quantity + $qty;

						$cartitem->amount = $cartitem->amount + ($qty * $amount);
						$cartitem->user_id = $user_id;
						if (!$cartitem->save()) {
							print_r($cartitem->getErrors());
							exit();
						}

					} else {
						$cartitem = new CartItems();
						$cartitem->category_id = $category_id;
						$cartitem->cart_id = $cart->id;
						$cartitem->amount = $qty * $amount;
						$cartitem->quantity = $qty;
						$cartitem->service_id = $service_id;
						$cartitem->user_id = $user_id;

						if (!$cartitem->save()) {
							print_r($cartitem->getErrors());
							exit();
						}

					}
					$data['status'] = self::API_OK;
					$data['details'] = $cart;
					$data['items'] = $cartitem;
					$data['message'] = \Yii::t('app', 'Added to Cart');
					return $this->sendJsonResponse($data);

				} else {
					$data['status'] = self::API_NOK;
					$data['error'] = \Yii::t('app', 'Cart unable to save');
				}
			}

			} else {
                $data['status'] = self::API_NOK;
                $data['error'] = Yii::t("app","No data posted");
            }
		}else {
            $data['status'] = self::API_NOK;
            $data['error'] = Yii::t("app","Invalid AuthCode");
        }

		return $this->sendJsonResponse($data);

	}

   //My Cart API
   public function actionMyCart()
   {
	   $data = [];
	   $post = Yii::$app->request->post();
	   $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
	   $auth = new AuthSettings();
	   $user_id = $auth->getAuthSession($headers);
	   if (!empty($user_id)) {

		   $cartData = Cart::find()->where([
			   'user_id' => $user_id,
		   ])->one();

		   if (!empty($cartData)) {
			  // if($cartData->store->is_open == 1){
				   $data['status'] =  self::API_OK;
				   $data['details'] = $cartData->asJson();
			   /*} else {

				   $data['status'] = 'NOK';
				   $data['error'] = "No cart items available";
			   }*/
			 

		   } else {

			   $data['status'] =  self::API_NOK;
			   $data['error'] = Yii::t("app","No cart items available");
		   }
	   } else {
		   $data['status'] =  self::API_NOK;
		   $data['error'] = Yii::t("app","No User found");
	   }
	   return $this->sendJsonResponse($data);
   }

   
   public function actionDeleteCart()
   {
	   $data = [];
	   $post = Yii::$app->request->post();
	   $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
	   $auth = new AuthSettings();
	   $user_id = $auth->getAuthSession($headers);
	   if (!empty($user_id)) {

		   $cartAlreadyExist = Cart::find()->where([
			   'user_id' => $user_id,
		   ])->one();

		   // var_dump($cartAlreadyExist->id);exit;
		   $cartItems = CartItems::find()->Where([
			   'cart_id' => $cartAlreadyExist->id,
		   ])->all();
		   if (!empty($cartItems)) {
			   foreach ($cartItems as $cartItem) {
				   $cartItem->delete();
			   }
		   }
		   $cartAlreadyExist->delete();
		   $data['status'] = "OK";
		   $data['details'] = "Data deleted successfully";
	   } else {
		   $data['status'] = "OK";
		   $data['error'] = "No user Found";
	   }
	   return $this->sendJsonResponse($data);
   }



	


}

