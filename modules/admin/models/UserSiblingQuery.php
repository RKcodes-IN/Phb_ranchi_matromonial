<?php

namespace app\modules\admin\models;

/**
 * This is the ActiveQuery class for [[UserSibling]].
 *
 * @see UserSibling
 */
class UserSiblingQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }

    /**
     * @inheritdoc
     * @return UserSibling[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserSibling|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
