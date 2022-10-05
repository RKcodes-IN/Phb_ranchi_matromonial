<?php

namespace app\modules\admin\models;

/**
 * This is the ActiveQuery class for [[LoanTypes]].
 *
 * @see LoanTypes
 */
class LoanTypesQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }

    /**
     * @inheritdoc
     * @return LoanTypes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LoanTypes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
