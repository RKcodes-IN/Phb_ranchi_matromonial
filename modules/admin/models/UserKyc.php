<?php

namespace app\modules\admin\models;

use Yii;
use \app\modules\admin\models\base\UserKyc as BaseUserKyc;

/**
 * This is the model class for table "user_kyc".
 */
class UserKyc extends BaseUserKyc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id', 'pancard_no', 'pancard_image', 'aadhar_no', 'aadhar_front', 'aadhar_back', 'pan_verification_status', 'aadhar_verification_status', 'cibil_score', 'status'], 'required'],
            [['user_id', 'pan_verification_status', 'aadhar_verification_status', 'cibil_score', 'status', 'create_user_id', 'update_user_id'], 'integer'],
            [['pancard_no', 'pancard_image', 'aadhar_no', 'aadhar_front', 'aadhar_back', 'created_on', 'updated_on'], 'string', 'max' => 255]
        ]);
    }
	

}
