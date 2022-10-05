<?php

namespace app\modules\admin\models;

/**
 * This is the ActiveQuery class for [[SiblingType]].
 *
 * @see SiblingType
 */
class SiblingTypeQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }

    /**
     * @inheritdoc
     * @return SiblingType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return SiblingType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
