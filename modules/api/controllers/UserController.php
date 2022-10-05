<?php

namespace app\modules\api\controllers;

use app\modules\api\controllers\BKController;
use yii;
use yii\filters\AccessControl;
use yii\filters\AccessRule;
use yii\helpers\ArrayHelper;
use app\components\AuthSettings;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use app\models\User;
use app\modules\admin\models\Auth;
use app\modules\admin\models\WebSetting;
use app\modules\admin\models\AuthSession;
use app\modules\admin\models\Temples;
use app\modules\admin\models\Notification;
use app\modules\admin\models\FamilyDetails;
use app\modules\admin\models\Likes;
use app\modules\admin\models\AvailablePincode;

class UserController extends BKController

{

    public function behaviors()
    {

        return ArrayHelper::merge(parent::behaviors(), [

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
                'class' => AccessControl::className(),
                'ruleConfig' => [

                    'class' => AccessRule::className()
                ],

                'rules' => [
                    [
                        'actions' => [
                            'check',
                            'index',
                            'my-profile',
                            'update-profile',
                            'add-family-details',
                            'add-to-fav',
                            'logout',
                            'check-delivery',

                        ],

                        'allow' => true,
                        'roles' => [
                            '@'
                        ]
                    ],
                    [

                        'actions' => [
                            'check',
                            'index',
                            'send-otp',
                            'resend-otp',
                            'verify-otp',
                            'my-profile',
                            'update-profile',
                            'add-family-details',
                            'add-to-fav',
                            'check-delivery',
                            'saved-address',

                        ],

                        'allow' => true,
                      'roles' => [

                            '?',
                            '*',

                        ]
                    ]
                ]
            ]

        ]);
    }


    public function actionIndex()
    {
        $data['details'] =  ['dsdsadsa'];
        return $this->sendJsonResponse($data);
    }

     //Check Address or Pin code deliverable or not
     public function actionCheckDelivery()
     {
         $data = [];
         $post = Yii::$app->request->post();
         if (!empty($post)) {
             $pincode = $post['pincode'];
             $checkDelivery = AvailablePincode::find()->Where(['pincode' => $pincode])->andWHere(['status' => 1])->all();
             if (!empty($checkDelivery)) {
                 $data['status'] = self::API_OK;
                 $data['error'] = "Great..! Our Service available here";
             } else {
                 $data['status'] = self::API_NOK;
                 $data['error'] = "Sorry Currently we are not delivering your location.Please try Other location";
             }
         } else {
             $data['status'] = self::API_NOK;
             $data['error'] = "No data posted.";
         }
         return $this->sendJsonResponse($data);
     }
 

    public function actionLogout()
    {
        $data = [];
        $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
        //$userID = Yii::$app->request->post();
        $auth = new AuthSettings();
        $user_id = $auth->getAuthSession($headers);
        if (!empty($user_id)) {
            $model = AuthSession::find()->where(['create_user_id' => $user_id])->one();
            if (!empty($model)) {
                $model->delete();
                if (Yii::$app->user->logout(false)) {
                    $data['status'] = self::API_OK;
                }
                $data['details'] = array("Successfully Logged Out");
            } else {
                $data['status'] = self::API_NOK;
                $data['error'] = array();
            }
        } else {
            $data['status'] = self::API_NOK;
            $data['error'] = ["User Not Found"];
        }
        return $this->sendJsonResponse($data);
    }
    public function actionCheck()
    {
        $data = [];

        $headers = getallheaders();
        $auth_code = isset($headers['auth_code']) ? $headers['auth_code'] : null;
        if ($auth_code == null) {
            $auth_code = \Yii::$app->request->get('auth_code');
        }
        if ($auth_code) {
            $auth_session = AuthSession::find()->where([
                'auth_code' => $auth_code,
            ])->one();
            if ($auth_session) {
                $user = $auth_session->createUser;
                $data['status'] = self::API_OK;
                $data['detail'] = $user;
                if (isset($_POST['AuthSession'])) {
                    $auth_session->device_token = $_POST['AuthSession']['device_token'];
                    if ($auth_session->save()) {
                        $data['auth_session'] = Yii::t("app", 'Auth Session updated');
                    } else {

                        $data['error'] = $auth_session->flattenErrors;
                    }
                }
            } else {
                $data['error'] = Yii::t("app", 'session not found');
            }
        } else {
            $data['error'] = Yii::t("app", 'Auth code not found');
            $data['auth'] = isset($auth_code) ? $auth_code : '';
        }

        return $this->sendJsonResponse($data);
    }

    public function actionSendOtp()
    {
        $data = [];
        $post = Yii::$app->request->post();
        if (!empty($post)) {
            $contact_no = $post['contact_no'];
            $send_otp = Yii::$app->notification->sendOtp($contact_no);
            $send_otp = json_decode($send_otp, true);
            // var_dump($send_otp);exit;
            if ($send_otp['Status'] == 'Success') {
                $data['status'] = self::API_OK;
                $data['details'] = $send_otp;
            } else {
                $data['status'] = self::API_NOK;
                $data['error'] = Yii::t("app", "OTP failed");
            }
        } else {
            $data['status'] = self::API_NOK;
            $data['error'] = Yii::t("app", "No data posted");
        }
        return $this->sendJsonResponse($data);
    }

    public function actionResendOtp()
    {
        $data = [];
        $post = Yii::$app->request->post();
        if (!empty($post)) {
            $contact_no = $post['contact_no'];
            $send_otp = Yii::$app->notification->resendOtp($contact_no);
            $send_otp = json_decode($send_otp, true);

            if ($send_otp['type'] == 'success') {
                $data['status'] = self::API_OK;
                $data['details'] = $send_otp;
            } else {
                $data['status'] = self::API_NOK;
                $data['error'] = Yii::t("app", "OTP failed");
            }
        } else {
            $data['status'] = self::API_NOK;
            $data['error'] = Yii::t("app", "No data posted");
        }
        return $this->sendJsonResponse($data);
    }

    public function actionVerifyOtp()
    {
        $data = [];
        $post = Yii::$app->request->post();
      
        if (!empty($post)) {

            $contact_no = $post['contact_no'];
            $session_code = $post['session_code'];
            $otp_code = $post['otp_code'];

            $send_otp = Yii::$app->notification->verifyOtp($session_code, $otp_code);

            $send_otp = json_decode($send_otp, true);

            if ($send_otp['Status'] == 'Success') {

                $providerId = "phone";

                $number = $post['contact_no'];
                $auth_id = $post['contact_no'];

                $auth = Auth::find()->where([
                    'source' => $providerId,
                    'source_id' => $auth_id,
                ])->one();

                if ($auth) {
    
                    $user = $auth->user;
                    $user->device_token = $post['device_token'];
                    $user->device_type = $post['device_type'];
                    Yii::$app->user->login($user);

                    $data['status'] = self::API_OK;
                    $data['details'] = $user;
                    $data['auth_code'] = AuthSession::newSession($user)->auth_code;
                } else {
                    //if($isNewUser == "true"){
                    $check = User::findOne(['contact_no' => $number]);
                    if (empty($check)) {
                        $model = new User();
                        $model->username = $number;
                        $model->contact_no = $number;
                        $model->device_token = $post['device_token'];
                        $model->device_type = $post['device_type'];
                        $model->referal_code = '';
                        $model->user_role =  User::ROLE_USER;

                        if ($model->validate()) {
                            // $model->roles = array($model->user_role);
                            if ($model->save()) {
                                $auth = new Auth();
                                $auth->user_id = $model->id;
                                $auth->source = $providerId;
                                $auth->source_id = $auth_id;
                                if ($auth->save(false)) {
                                    // //Find User 
                                    // $getUser = User::find()->Where(['username' =>$number,'contact_no'=>$number ])->one();
                                    // $data['status'] = self::API_OK; 
                                    // $data['details'] = $getUser;
                                    // $data['auth_code'] = AuthSession::newSession($model)->auth_code;
                                    $user = $auth->user;
                                    $user->device_token = $post['device_token'];
                                    $user->device_type = $post['device_type'];
                                    Yii::$app->user->login($user);

                                    $data['status'] = self::API_OK;
                                    $data['details'] = $user;
                                    $data['auth_code'] = AuthSession::newSession($user)->auth_code;



                                    /* $emailtemplate = new EmailTemplate();
                                        $mailcontent = [
                                        'USER' => $model->first_name,
                                        'type_id' => EmailTemplate::SIGNUP,
                                        'EMAIL' => $model->email,
                                        'USERNAME' => $model->username,
                                        ];
                                        $emailtemplate->sendEmail($mailcontent); */

                                    //Check is cashback enable or not
                                    /* $setting = new WebSetting();
                                        $enable_signup_bonus = $setting->getSettingBykey('enable_signup_bonus');
                                        $signup_bonus = $setting->getSettingBykey('signup_bonus');
                    
                                        if ($enable_signup_bonus == 1) {
                                            $transaction = new CashbackTransaction();
                                            $transaction->reference_id = $transaction->getToken(12);
                                            $transaction->user_id = $model->id;
                                            $transaction->model_type = get_class($model);
                                            $transaction->payment_type = 'Signup Bonus';
                                            $transaction->amount = $signup_bonus;
                                            $transaction->created_date = date('Y-m-d');
                                            $transaction->payment_status = CashbackTransaction::STATUS_APPROVED;
                    
                                            //$transaction->save();
                                            if (!$transaction->save(false)) {
                    
                                                print_r($transaction->getErrors());
                                                exit();
                                            }  
                                        } */
                                    $notification = new Notification();
                                    $notification->title = 'New User Registered';
                                    $notification->icon = 'fas fa-user';
                                    $notification->user_id = $model->id;
                                    //$notification->created_date = date('Y-m-d H:i:s');
                                    $notification->check_on_ajax = 0;
                                    $notification->module = '';
                                    $notification->model_type = get_class(new User());
                                    $notification->save(false);
                                } else {
                                    $data['status'] = self::API_NOK;
                                    $data['error'] = $auth->getErrors();
                                }
                            } else {
                                $data['status'] = self::API_NOK;
                                $data['error'] = $model->getErrors();
                            }
                        } else {
                            $data['status'] = self::API_NOK;
                            $data['error'] = $model->getErrors();
                        }
                    } else {
                        $data['status'] = self::API_NOK;
                        $data['error'] = Yii::t("app", 'This number is already registered with us.Please Contact Support');
                    }
                }
            } else {
                $data['status'] = self::API_NOK;
                $data['error'] = Yii::t("app", "OTP failed");
            }
        } else {
            $data['status'] = self::API_NOK;
            $data['error'] = Yii::t("app", "No  Data Posted");
        }
        return $this->sendJsonResponse($data);
    }

    public function actionMyProfile()
    {
        $data = [];
        $post = Yii::$app->request->post();
        $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
        $auth = new AuthSettings();
        $user_id = $auth->getAuthSession($headers);
        if (!empty($user_id)) {
            $model = User::findOne($user_id);
            $d['user_details'] = $model->asJson();
            $data['status'] = SELF::API_OK;
            $data['details'] = $d;
        } else {
            $data['status'] = SELF::API_NOK;
            $data['error'] = Yii::t("app", "User Not Found");
        }
        return $this->sendJsonResponse($data);
    }

    public function actionUpdateProfile()
    {
        $data = [];
        $post = Yii::$app->request->post();
        $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
        $auth = new AuthSettings();
        $user_id = $auth->getAuthSession($headers);
        if (!empty($user_id)) {
            if (!empty($post)) {
                $model = User::find()->where(['id' => $user_id])->andWhere(['user_role' => User::ROLE_USER])->one();

                if (!empty($model)) {
                    $model->first_name =  $post['User']['username'];
                    if (!empty($post['User']['profile_image'])) {
                        $profile_image = $model->profileImage($post['User']['profile_image'], $model->first_name);
                        $model->profile_image = $profile_image;
                    }
                    if (!empty($post['User']['email'])) {
                        $model->email = $post['User']['email'];
                    }
                    $model->username = $model->email;

                    if ($model->update(false)) {
                        $data['status'] = self::API_OK;
                        $data['details'] = $model->asJson();
                    } else {
                        $data['status'] = self::API_NOK;
                        $data['error'] = Yii::t("app", 'Something Went Wrong');
                    }
                } else {
                    $data['status'] = SELF::API_NOK;
                    $data['error'] = Yii::t("app", "User Not Found");
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

    public function actionAddFamilyDetails()
    {
        $data = [];
        $post = Yii::$app->request->post();
        $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
        $auth = new AuthSettings();
        $user_id = $auth->getAuthSession($headers);
        if (!empty($user_id)) {
            if (!empty($post)) {
                $model = new FamilyDetails();
                $model->user_id = $user_id;
                $model->full_name = $post['full_name'];
                $model->gothram = $post['gothram'];
                $model->sunsign = $post['sunsign'];
                $model->star = $post['star'];
                $model->dob = $post['dob'];
                $model->anniversary_date = $post['anniversary_date'];
                $model->status = FamilyDetails::STATE_ACTIVE;
                if ($model->save(false)) {
                    $data['status'] = SELF::API_OK;
                    $data['details'] = $model->asJson();
                } else {
                    $data['status'] = SELF::API_NOK;
                    $data['error'] = $model->getErrors();
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

    public function actionAddToFav()
    {

        $data = [];
        $post = Yii::$app->request->post();
        $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
        $auth = new AuthSettings();
        $user_id = $auth->getAuthSession($headers);
        if (!empty($user_id)) {
            $model = new Likes();
            // var_dump($likes); exit;
            $like_exist = Likes::find()->where(['user_id' => $user_id])->andWhere(['temple_id' => $post['temple_id']])->one();
            if (empty($like_exist)) {
                $model->user_id = $user_id;
                $model->temple_id = $post['temple_id'];
                $model->type_id = 1;
                if ($model->save(false)) {
                    // $likes = $model::getCount($post['temple_id']);
                    $d['message'] = Yii::t("app", "Added to Wishlist");
                    // $d['likes_count'] = $likes;
                    $data['status'] = SELF::API_OK;
                    $data['details'] = $d;
                } else {
                    $data['status'] = SELF::API_NOK;
                    $data['error'] = Yii::t("app", "Something Went Wrong");
                }
            } else {
                if ($like_exist->delete()) {
                    //$likes = $model::getCount($post['temple_id']);
                    $d['message'] = Yii::t("app", " Removed From Wishlist");
                    // $d['likes_count'] = $likes;
                    $data['status'] = SELF::API_OK;
                    $data['details'] = $d;
                } else {
                    $data['status'] = SELF::API_OK;
                    $data['error'] = Yii::t("app", "Something Went Wrong");
                }
            }
        } else {
            $data['status'] = SELF::API_NOK;
            $data['error'] = Yii::t("app", "User Not Found");
        }

        return $this->sendJsonResponse($data);
    }

    // Add Delivery Address
    public function actionSavedAddress()
    {
        $data = [];
        $post = Yii::$app->request->post();
        $headers = isset(\Yii::$app->request->headers['auth_code']) ? \Yii::$app->request->headers['auth_code'] : Yii::$app->request->getQueryParam('auth_code');
        $auth = new AuthSettings();
        $user_id = $auth->getAuthSession($headers);
        if (!empty($user_id)) {
            if (!empty($post)) {
                //var_dump($post); exit;
                $model = new DeliveryAddress();
                $model->user_id = $user_id;
                $model->address = $post['address'];
                $model->location = $post['location'];
                $model->latitude = $post['latitude'];
                $model->longitude = $post['longitude'];
                $model->address_label = $post['address_label'];
                $model->land_mark = isset($post['land_mark']) ? $post['land_mark'] : '';
                $model->status = 1;
                //$model->created_date = date ( "Y-m-d" );
                if ($model->save()) {
                    $data['status'] = SELF::API_OK;
                    $data['details'] = $model;
                } else {
                    $data['message'] = $model->getErrors();
                }
            } else {
                $data['status'] = SELF::API_NOK;
                $data['message'] = Yii::t("app", "No Data Post");
            }
        } else {
            $data['status'] = self::API_NOK;
            $data['error'] = "No User found.";
        }
        return $this->sendJsonResponse($data);
    }
}
