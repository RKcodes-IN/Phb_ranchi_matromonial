<?php

namespace app\modules\admin\models;

/**
 * This is the ActiveQuery class for [[Loan]].
 *
 * @see Loan
 */
class LoanQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }

    /**
     * @inheritdoc
     * @return Loan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Loan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
