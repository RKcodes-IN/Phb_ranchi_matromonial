<?php

namespace app\modules\admin\models;

/**
 * This is the ActiveQuery class for [[AgentKyc]].
 *
 * @see AgentKyc
 */
class AgentKycQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }

    /**
     * @inheritdoc
     * @return AgentKyc[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AgentKyc|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
