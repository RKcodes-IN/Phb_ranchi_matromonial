<?php

namespace app\modules\admin\models;

use Yii;
use \app\modules\admin\models\base\AgentKyc as BaseAgentKyc;

/**
 * This is the model class for table "agent_kyc".
 */
class AgentKyc extends BaseAgentKyc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['agent_id', 'pancard_no', 'pancard_image', 'aadhar_no', 'aadhar_front', 'aadhar_back', 'selfe', 'pan_status', 'aadhar_status', 'selfie_status'], 'required'],
            [['agent_id', 'pan_status', 'aadhar_status', 'selfie_status', 'status', 'created_on', 'updated_on', 'create_user_id', 'update_user_id'], 'integer'],
            [['pancard_no', 'pancard_image', 'aadhar_no', 'aadhar_front', 'aadhar_back', 'selfe'], 'string', 'max' => 255]
        ]);
    }
	

}
