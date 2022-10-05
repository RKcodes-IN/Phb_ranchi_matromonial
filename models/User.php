<?php

namespace app\models;

use app\traits\models\WithStatus;
use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;
use app\modules\admin\models\WebSetting;
use app\modules\admin\models\AuthSession;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 * @property-read string fullName
 * @property-read string shortName
 */
class User extends ActiveRecord implements IdentityInterface
{
	public $confirm_password;
	public $newPassword;
	public $oauth_client_user_id;
	public $oauth_client;
	public $access_token;
	public $passwordRepeat;
	public $device_token;
	public $contact_no;
	public $device_type;

	
	use WithStatus;
	
	const STATUS_ACTIVE = 10;
	const STATUS_BLOCKED = 0;

	//const ROLE_USER = 'User';
	
	
	const ROLE_ADMIN = 'admin';
	const ROLE_SUBADMIN = 'Subadmin';
	// // const ROLE_VENDOR = 'Vendor';
    const ROLE_MANAGER = 'Manager';
	const ROLE_USER = 'User';
	// const ROLE_AGENT = 'Agent';
	// const ROLE_PRIEST = 'Priest';
	

	

	const SIGNUP_TYPE_SOCIAL_MEDIA = 1;
    const SIGNUP_TYPE_MOBILE = 2;
    const SIGNUP_TYPE_SITE = 0;
    
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{user}}';
	}
	
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			['status', 'default', 'value' => self::STATUS_ACTIVE],
			['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_BLOCKED]],
			[['first_name', 'last_name', 'username','user_role','oauth_client_user_id',
			'oauth_client','profile_image','access_token','device_token'], 'string'],
			[['contact_no'],'integer','message' => 'Phone number must be a valid one.'],
			['contact_no', 'string', 'length'=>10],
		//	[['contact_no'], 'length', 'max' => 10],
				/*[
					[
						'contact_no',
					],
					'string',
					'max' => 10
				],*/
			//[['user_role'], 'safe'],
			//[[ 'username','password','passwordRepeat'], 'required'],
			[[ 'username'], 'required'],
		
			[[ 'username'], 'unique'],
			['email', 'email'],
			[['email'], 'unique'],
			[['contact_no','device_type'],'integer'],
			[['referal_id','referal_code','noline_status','signup_type','city_id'],'safe'],
			/*[
                [
                    'email',
					'username',
					'oauth_client_user_id',
					'first_name',
					'oauth_client',
					'profile_image',
					'user_role',
					'status',
					'access_token'
                ],
                'required',
                'on' => 'facebook-login'
			],*/
			[ 
				[ 
						//'username',
						'email',
						'first_name',
						//'contact_no',
					
						

				
				],
				'required',
				'on' => [ 
					
						'add-user' 
				] 
		],
		[['first_name'],'string','message' => 'Username cannot be blank.'],
		[
			'newPassword',
			'compare',
			'compareAttribute' => 'confirm_password',
			'on' => [
				'changepassword'
			]
		],
		];
	}
	public function scenarios()
    {
		$scenarios = parent::scenarios();
		$scenarios['changepassword'] = [
            'newPassword',
            'confirm_password',
            'password'
        ];
		$scenarios['add-user'] = [
            'email',
            'username',
            'first_name',
            'password',
            'referal_id',
			'referal_code',
			'access_token'
		];
		$scenarios['update-profile'] = [
            //'email',
            'first_name',
            'contact_no',
            'profile_image',
            'email'
           
        ];
      
        $scenarios ['facebook-login'] = [
            'email',
            'username',
            'oauth_client_user_id',
            'first_name',
            'oauth_client',
            'profile_image',
			'user_role',
			'status',
			'signup_type'
			//'access_token'
           
		];
		$scenarios['phone-login'] = [
			'contact_no',
			'device_token',
			'device_type',
            'oauth_client',
            'oauth_client_user_id'
        ];
		$scenarios['rest-user'] = [
			'email','contact_no'
        ];
       
        $scenarios ['update-latlong'] = [
            'latitude',
            // 'username',
            'longitude',
           
           
        ];




        return $scenarios;
    }
	/**
	 * User full name
	 * (as first/last name)
	 *
	 * @return string
	 */
	public function getFullName()
	{
		return "{$this->first_name} {$this->last_name}";
	}

	/**
	 * User short name
	 * (as first name, last name first letter)
	 *
	 * @return string
	 */
	public function getShortName()
	{
		return trim($this->first_name . ' ' . ($this->last_name ? $this->last_name{0} . '.' : ''));
	}
	
	public function getChangeStatus()
	{
		return[
			self::STATUS_ACTIVE => 'ative',
			self::STATUS_BLOCKED => 'In active',
		];
		
	}



	/**
	 * List of user status aliases
	 *
	 * @return array
	 */
	public static function getStatusesList()
	{
		return [
			static::STATUS_ACTIVE  => 'Active',
			static::STATUS_BLOCKED => 'Blocked',
		];
	}
	public function stateBadges()
    {
        $states = $this->getStatusesList();
        if ($this->status == self::STATUS_ACTIVE) {
            return '<span class="badge badge-success">' . $states[self::STATUS_ACTIVE] . '</span>';
        } elseif ($this->status == self::STATUS_BLOCKED) {
            return '<span class="badge badge-default">' . $states[self::STATUS_BLOCKED] . '</span>';
        } /*else if ($this->status == self::STATE_DELETED) {
            return '<span class="badge badge-danger">' . $states[self::STATE_DELETED] . '</span>';
        }*/
    }
	
	public function getRoles() {
		return [ 
			
				self::ROLE_ADMIN => 'admin',
				self::ROLE_SUBADMIN => 'subadmin',
				// self::ROLE_VENDOR => 'vendor',
				self:: ROLE_MANAGER => 'manager',
				// self:: ROLE_AGENT => 'Agent',
				// self::ROLE_PRIEST => 'Priest',
				self::ROLE_USER => 'User',
			
		];
	}
	/**
	 * @return array
	 */
	// public static function getRolesList()
	// {
	// 	$roles = array_keys(Yii::$app->authManager->getRoles());
		
	// 	return array_combine($roles, $roles);
	// }
	
	/**
	 * Assign a role to user
	 *
	 * @param string $role
	 *
	 * @return bool
	 */
	public function assignRole($role)
	{
		if (!Yii::$app->authManager->checkAccess($this->id, $role)) {
			$authRole = Yii::$app->authManager->getRole($role);
			Yii::$app->authManager->assign($authRole, $this->id);
			
			return true;
		}
		
		return false;
	}
	
	/**
	 * @inheritdoc
	 */
	public static function findIdentity($id)
	{
		return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
	}
	
	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{
		return static::findOne([
            'access_token' => $token
        ]);
		//throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
	}
	
	/**
	 * Finds user by username
	 *
	 * @param string $username
	 *
	 * @return static|null
	 */
	public static function findByUsername($username)
	{
		//return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
		/*return static::findOne(['OR',
		[ 'username' => $username],['contact_no'=>$username]]);*/

		$user = User::find()->where([ 'email' => $username ])
		//->andWhere(['status' => self::STATUS_ACTIVE])
		->one();

		return $user;
		
	}
	
	/**
	 * Finds user by password reset token
	 *
	 * @param string $token password reset token
	 *
	 * @return static|null
	 */
	public static function findByPasswordResetToken($token)
	{
		if (!static::isPasswordResetTokenValid($token)) {
			return null;
		}
		
		return static::findOne([
			'password_reset_token' => $token,
			'status'               => self::STATUS_ACTIVE,
		]);
	}
	
	/**
	 * Finds out if password reset token is valid
	 *
	 * @param string $token password reset token
	 *
	 * @return bool
	 */
	public static function isPasswordResetTokenValid($token)
	{
		if (empty($token)) {
			return false;
		}
		$timestamp = (int)substr($token, strrpos($token, '_') + 1);
		$expire = '3600';
		
		return $timestamp + $expire >= time();
	}
	
	/**
	 * @inheritdoc
	 */
	public function getId()
	{
		return $this->getPrimaryKey();
	}
	
	/**
	 * @inheritdoc
	 */
	public function getAuthKey()
	{
		return $this->auth_key;
	}
	
	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey)
	{
		return $this->getAuthKey() === $authKey;
	}
	
	/**
	 * Validates password
	 *
	 * @param string $password password to validate
	 *
	 * @return bool if password provided is valid for current user
	 */
	public function validatePassword($password)
	{
		/*if(Yii::$app->security->validatePassword($password, $this->password_hash)){
			return true;
		}else{ return false;}*/
		return Yii::$app->security->validatePassword($password, $this->password_hash);
	}
	
	/**
	 * Generates password hash from password and sets it to the model
	 *
	 * @param string $password
	 */
	public function setPassword($password)
	{
		$this->password_hash = Yii::$app->security->generatePasswordHash($password);
	}
	public function getPassword()

    {

        return '';

    }
	
	/**
	 * Generates "remember me" authentication key
	 */
	public function generateAuthKey()
	{
		$this->auth_key = Yii::$app->security->generateRandomString();
	}
	
	/**
	 * Generates new password reset token
	 */
	public function generatePasswordResetToken()
	{
		$this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
	}
	
	/**
	 * Removes password reset token
	 */
	public function removePasswordResetToken()
	{
		$this->password_reset_token = null;
	}
	//Check Auth 

	function GenerateRandString1($len, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789')
	{
		$string = '';
		for ($i = 0; $i < $len; $i++)
		{
			$pos = rand(0, strlen($chars)-1);
			$string .= $chars{$pos};
		}
		return $string;
	}

	
	 /**
     * @return \yii\db\ActiveQuery
     */
   
	
	public function profileImage($profile_image, $user_name){

        $image = str_replace('data:image/png;base64,', '', $profile_image);
							// $ext = explode(';',explode('data:image/',$_POST['image'])[1])[0];
							if (! empty ( $image )) {
							$ext = 'png';
							$image = str_replace(' ', '+', $image);
							
							// Decode the Base64 encoded Image
							$data1 = base64_decode($image);
							// Create Image path with Image name and Extension
							
						//	$image_name = \Yii::$app->urlManager->createAbsoluteUrl('uploads').'/'.$user_name.'_'.mt_rand().'.'.$ext;
							$image_name = $user_name.'_'.mt_rand().'.'.$ext;
							$file = 'uploads/'.$image_name;
							// Save Image in the Image Directory
							$success = file_put_contents($file, $data1);
							if($success===FALSE){
								$data['profile_image'] = 'Not saved';
							}else{
								return  \Yii::$app->urlManager->createAbsoluteUrl('uploads').'/'.$image_name;
							}
							 }
	}
	public function UserNotification($user_id,$title,$body,$type,$api_key)
	{
	 
  // Custom Notification to Restaurant Owner
//fesa partener anxion 
	$setting = new WebSetting();
	//$api_key = $setting->getSettingBykey('farm_user');

  //$api_key = 'AAAA2c8MJKE:APA91bEq8lyBUfHlNaQ_3TERLsG1P-6oHb9mVlYZpZF9pkLQv-U8rN0WJfMS57h2fRMtLNTatDl2LA1ne4MDCAsoQ2upXI89VOF-i8Jf-rWXx9Ks3s93PdZQBzGiFPXs_15YshHlMhmQ';

	//var_dump($api_key); exit;
		$auth_sess = new \app\modules\admin\models\AuthSession();
		$device_token =  $auth_sess->getDeviceToken($user_id);
		//var_dump($user_id); exit;
		$title = $title;
		$body = $body;
		$type = $type;
		$msg = array
			(
			'title' =>  $title,
			'body' => $body,
			'vibrate' => 1,
			'sound' => 1,
			'largeIcon' => 'large_icon',
			'smallIcon' => 'small_icon',
			'type' => $type,
			//'order_id' => $order_id
		   // 'request_id' =>  $id,
		);
		$msg1 = array
			(
			'title' =>  $title,
			'body' => $body,
			'vibrate' => 1,
			'sound' => 1,
			'largeIcon' => 'large_icon',
			'smallIcon' => 'small_icon',
		   // 'request_id' =>  $id,
		);
		$fields = array
			(
			'to' => $device_token,
			'collapse_key' => 'type_a',
		   // 'notification' => $msg1,
			'data' => $msg,

		);
		

		$headers = array
			(
			'Authorization: key=' . $api_key,
			'Content-Type: application/json',
		);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		//var_dump($result); exit;
		curl_close($ch);
		return $result;

	}

	public static function isAdmin()
    {
        if (empty (\Yii::$app->user->identity)) {
            return false;
        }
        return \Yii::$app->user->identity->user_role == self::ROLE_ADMIN;
    }

	public static function isSubAdmin()
    {
        if (empty (\Yii::$app->user->identity)) {
            return false;
        }
        return \Yii::$app->user->identity->user_role == self::ROLE_SUBADMIN;
    }

    public static function isManager()
    {
        if (empty (\Yii::$app->user->identity)) {
            return false;
        }
        return \Yii::$app->user->identity->user_role == self::ROLE_MANAGER;
	}
	
	// public static function isPriest()
    // {
    //     if (empty (\Yii::$app->user->identity)) {
    //         return false;
    //     }
    //     return \Yii::$app->user->identity->user_role == self::ROLE_PRIEST;
	// }

    public static function isUser()
    {
        if (empty (\Yii::$app->user->identity)) {
            return false;
        }
        return \Yii::$app->user->identity->user_role == self::ROLE_USER;
    }

	public function getSibling()
    {
        return $this->hasMany(\app\modules\admin\models\UserSibling::className(), ['user_id' => 'id']);
    }
   

	public static function getUserAddress($id){
		if(!empty($id)){
			
		}
	}
	function getReferredUserscount($id){
        $referreduserscount = User::find()->where([
          'referal_id' =>$id
    ])->count();
        return  $referreduserscount;
    }
	public function getUserDetail()
    {
        return $this->hasOne(\app\modules\admin\models\UserDetail::className(), ['user_id' => 'id']);
    }
	public function asJson(){
		$data = [];
		$data['username'] = $this->first_name;
		$data['email'] = $this->email;
		$data['contact_no'] = $this->contact_no;
		$data['address'] = $this->address;
		$data['date_of_birth'] = $this->date_of_birth;
		$data['profile_image'] = $this->profile_image;
		$data['id_proof'] = $this->id_proof;
		$data['user_role'] = $this->user_role;
		$data['created_at'] = date('d-m-Y', $this->created_at); 
		 
		
		return $data;
	}
    
}
