<?php

namespace app\modules\admin\models;

use Yii;
use \app\modules\admin\models\base\SiblingType as BaseSiblingType;

/**
 * This is the model class for table "sibling_type".
 */
class SiblingType extends BaseSiblingType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['title', 'status', ], 'required'],
            [['status', 'created_on', 'updated_on'], 'integer'],
            [['create_user_id', 'update_user_id','created_on', 'updated_on', 'create_user_id', 'update_user_id'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ]);
    }
	

}
