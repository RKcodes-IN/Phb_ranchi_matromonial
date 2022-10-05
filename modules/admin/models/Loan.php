<?php

namespace app\modules\admin\models;

use Yii;
use \app\modules\admin\models\base\Loan as BaseLoan;

/**
 * This is the model class for table "loan".
 */
class Loan extends BaseLoan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id', 'amount', 'loan_type', 'status'], 'required'],
            [['user_id', 'loan_type', 'is_paid', 'agent_id', 'status', 'create_user_id', 'update_user_id'], 'integer'],
            [['amount'], 'number'],
            [['created_on', 'updated_on'], 'string', 'max' => 255]
        ]);
    }
	

}
