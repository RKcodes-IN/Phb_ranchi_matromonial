<?php

namespace app\modules\admin\models;

use Yii;
use \app\modules\admin\models\base\UserImage as BaseUserImage;

/**
 * This is the model class for table "user_image".
 */
class UserImage extends BaseUserImage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id', 'image_url', 'status', 'created_on', 'updated_on', 'create_user_id', 'update_user_id'], 'required'],
            [['user_id', 'status', 'created_on', 'updated_on'], 'integer'],
            [['create_user_id', 'update_user_id'], 'safe'],
            [['image_url'], 'string', 'max' => 255]
        ]);
    }
	

}
