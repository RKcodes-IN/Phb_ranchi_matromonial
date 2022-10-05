<?php

namespace app\modules\admin\models;

use Yii;
use \app\modules\admin\models\base\LoanTypes as BaseLoanTypes;

/**
 * This is the model class for table "loan_types".
 */
class LoanTypes extends BaseLoanTypes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'image', 'description', 'status'], 'required'],
            [['status', 'create_user_id', 'update_user_id'], 'integer'],
            [['name', 'image', 'description', 'created_on', 'updated_on'], 'string', 'max' => 255]
        ]);
    }
	

}
