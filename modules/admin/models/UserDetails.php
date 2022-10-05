<?php

namespace app\modules\admin\models;

use Yii;
use \app\modules\admin\models\base\UserDetails as BaseUserDetails;

/**
 * This is the model class for table "user_details".
 */
class UserDetails extends BaseUserDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id', 'maritial_status', 'father_name', 'user_selfie', 'status'], 'required'],
            [['user_id', 'status', 'create_user_id', 'update_user_id'], 'integer'],
            [['maritial_status', 'father_name', 'user_selfie', 'created_on', 'updated_on'], 'string', 'max' => 255]
        ]);
    }
	

}
