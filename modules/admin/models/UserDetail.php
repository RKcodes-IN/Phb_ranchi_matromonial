<?php

namespace app\modules\admin\models;

use Yii;
use \app\modules\admin\models\base\UserDetail as BaseUserDetail;

/**
 * This is the model class for table "user_detail".
 */
class UserDetail extends BaseUserDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [[ 'marital_status', 'category',  'gender', 'cast', 'name', 'cast_gotra', 'dob', 'tob', 'place_of_birth', 'phone_number', 'whats_app_number', 'height', 'house_type', 'address', 'complexion', 'qualification', 'other_qualification', 'physique', 'occupication', 'monthly_income', 'prefrence', 'no_children', 'handicapped',  'fathers_name', 'fathers_occupation', 'fathers_age', 'fathers_monthly_income', 'mothers_name', 'mothers_occupation', 'mothers_age', 'mothers_monthly_income',  'status',], 'required'],
            [['user_id', 'marital_status', 'category', 'gender', 'cast', 'complexion', 'no_children', 'handicapped', 'status', 'created_on', 'updated_on'], 'integer'],
            [['monthly_income'], 'number'],
            [['user_id','create_user_id', 'update_user_id','upload_kundli','disability_description','register_number',], 'safe'],
            [['register_number', 'profile_image', 'name', 'cast_gotra', 'dob', 'tob', 'place_of_birth', 'phone_number', 'whats_app_number', 'height', 'address', 'qualification', 'other_qualification', 'physique', 'occupication', 'prefrence', 'disability_description', 'fathers_name', 'fathers_occupation', 'fathers_age', 'fathers_monthly_income', 'mothers_name', 'mothers_occupation', 'mothers_age', 'mothers_monthly_income', 'upload_kundli'], 'string', 'max' => 255],
            [['house_type'], 'string', 'max' => 11],
            [['profile_image'], 'file'],
            [['profile_image'], 'required', 'on' => 'create'],
        ]);
    }
	

}
