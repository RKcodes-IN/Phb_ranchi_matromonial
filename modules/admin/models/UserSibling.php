<?php

namespace app\modules\admin\models;

use Yii;
use \app\modules\admin\models\base\UserSibling as BaseUserSibling;

/**
 * This is the model class for table "user_sibling".
 */
class UserSibling extends BaseUserSibling
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['id', 'user_id', 'user_detail_id', 'sibling_type_id', 'name', 'age', 'education_qulification', 'married', 'occupation', 'created_on', 'updated_on', 'create_user_id', 'update_user_id'], 'required'],
            [['id', 'user_id', 'user_detail_id', 'sibling_type_id', 'married', 'created_on', 'updated_on'], 'integer'],
            [['create_user_id', 'update_user_id'], 'safe'],
            [['name', 'age', 'education_qulification', 'occupation'], 'string', 'max' => 255]
        ]);
    }
	

}
