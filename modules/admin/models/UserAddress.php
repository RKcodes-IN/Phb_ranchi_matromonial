<?php

namespace app\modules\admin\models;

use Yii;
use \app\modules\admin\models\base\UserAddress as BaseUserAddress;

/**
 * This is the model class for table "user_address".
 */
class UserAddress extends BaseUserAddress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id', 'address_proof', 'address_proof_image', 'address', 'pincode', 'city', 'status'], 'required'],
            [['user_id', 'status', 'create_user_id', 'update_user_id'], 'integer'],
            [['address_proof', 'address_proof_image', 'address', 'pincode', 'city', 'created_on', 'updated_on'], 'string', 'max' => 255]
        ]);
    }
	

}
