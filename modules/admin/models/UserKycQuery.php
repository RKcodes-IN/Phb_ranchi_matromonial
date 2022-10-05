<?php

namespace app\modules\admin\models;

/**
 * This is the ActiveQuery class for [[UserKyc]].
 *
 * @see UserKyc
 */
class UserKycQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }

    /**
     * @inheritdoc
     * @return UserKyc[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserKyc|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
