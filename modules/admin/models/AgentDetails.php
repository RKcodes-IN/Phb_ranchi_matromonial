<?php

namespace app\modules\admin\models;

use Yii;
use \app\modules\admin\models\base\AgentDetails as BaseAgentDetails;

/**
 * This is the model class for table "agent_details".
 */
class AgentDetails extends BaseAgentDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['agent_id', 'no_of_bank_tied', 'partner_type', 'team_members', 'roi', 'commission_form', 'document_verifcation', 'consulation_fee', 'customers_served_till', 'status'], 'required'],
            [['agent_id', 'no_of_bank_tied', 'team_members', 'document_verifcation', 'consulation_fee', 'customers_served_till', 'certified_dsa', 'avg_processing_day', 'doorstep_service', 'loan_offer', 'establishment_year', 'quick_solution', 'status', 'create_user_id', 'update_user_id'], 'integer'],
            [['partner_type'], 'string', 'max' => 244],
            [['roi', 'commission_form', 'created_on', 'updated_on'], 'string', 'max' => 255]
        ]);
    }
	

}
