<?php

namespace app\modules\admin\models;

/**
 * This is the ActiveQuery class for [[UserDetail]].
 *
 * @see UserDetail
 */
class UserDetailQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }

    /**
     * @inheritdoc
     * @return UserDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
