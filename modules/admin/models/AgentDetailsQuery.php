<?php

namespace app\modules\admin\models;

/**
 * This is the ActiveQuery class for [[AgentDetails]].
 *
 * @see AgentDetails
 */
class AgentDetailsQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }

    /**
     * @inheritdoc
     * @return AgentDetails[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AgentDetails|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
