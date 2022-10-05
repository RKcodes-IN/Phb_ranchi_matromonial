<?php


namespace app\modules\admin\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;
/**
 * This is the base model class for table "agent_details".
 *
 * @property integer $id
 * @property integer $agent_id
 * @property integer $no_of_bank_tied
 * @property string $partner_type
 * @property integer $team_members
 * @property string $roi
 * @property string $commission_form
 * @property integer $document_verifcation
 * @property integer $consulation_fee
 * @property integer $customers_served_till
 * @property integer $certified_dsa
 * @property integer $avg_processing_day
 * @property integer $doorstep_service
 * @property integer $loan_offer
 * @property integer $establishment_year
 * @property integer $quick_solution
 * @property integer $status
 * @property string $created_on
 * @property string $updated_on
 * @property integer $create_user_id
 * @property integer $update_user_id
 *
 * @property \app\models\User $agent
 */
class AgentDetails extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'agent'
        ];
    }

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETE = 2;

    const IS_FEATURED = 1;
    const IS_NOT_FEATURED = 0;
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['agent_id', 'no_of_bank_tied', 'partner_type', 'team_members', 'roi', 'commission_form', 'document_verifcation', 'consulation_fee', 'customers_served_till', 'status'], 'required'],
            [['agent_id', 'no_of_bank_tied', 'team_members', 'document_verifcation', 'consulation_fee', 'customers_served_till', 'certified_dsa', 'avg_processing_day', 'doorstep_service', 'loan_offer', 'establishment_year', 'quick_solution', 'status', 'create_user_id', 'update_user_id'], 'integer'],
            [['partner_type'], 'string', 'max' => 244],
            [['roi', 'commission_form', 'created_on', 'updated_on'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agent_details';
    }

    public function getStateOptions()
    {
        return [

            self::STATUS_INACTIVE => 'In Active',
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_DELETE => 'Deleted',

        ];
    }
    public function getStateOptionsBadges()
    {

        if ($this->status == self::STATUS_ACTIVE) {
            return '<span class="badge badge-success">Active</span>';
        } elseif ($this->status == self::STATUS_INACTIVE) {
            return '<span class="badge badge-default">In Active</span>';
        }elseif ($this->status == self::STATUS_DELETE) {
            return '<span class="badge badge-danger">Deleted</span>';
        }

    }

    public function getFeatureOptions()
    {
        return [

            self::IS_FEATURED => 'Is Featured',
            self::IS_NOT_FEATURED => 'Not Featured',
           
        ];
    }

    public function getFeatureOptionsBadges()
    {
        if ($this->is_featured == self::IS_FEATURED) {
            return '<span class="badge badge-success">Featured</span>';
        } elseif ($this->is_featured == self::IS_NOT_FEATURED) {
            return '<span class="badge badge-danger">Not Featured</span>';
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'agent_id' => Yii::t('app', 'Agent ID'),
            'no_of_bank_tied' => Yii::t('app', 'No Of Bank Tied'),
            'partner_type' => Yii::t('app', 'Partner Type'),
            'team_members' => Yii::t('app', 'Team Members'),
            'roi' => Yii::t('app', 'Roi'),
            'commission_form' => Yii::t('app', 'Commission Form'),
            'document_verifcation' => Yii::t('app', 'Document Verifcation'),
            'consulation_fee' => Yii::t('app', 'Consulation Fee'),
            'customers_served_till' => Yii::t('app', 'Customers Served Till'),
            'certified_dsa' => Yii::t('app', 'Certified Dsa'),
            'avg_processing_day' => Yii::t('app', 'Avg Processing Day'),
            'doorstep_service' => Yii::t('app', 'Doorstep Service'),
            'loan_offer' => Yii::t('app', 'Loan Offer'),
            'establishment_year' => Yii::t('app', 'Establishment Year'),
            'quick_solution' => Yii::t('app', 'Quick Solution'),
            'status' => Yii::t('app', 'Status'),
            'created_on' => Yii::t('app', 'Created On'),
            'updated_on' => Yii::t('app', 'Updated On'),
            'create_user_id' => Yii::t('app', 'Create User ID'),
            'update_user_id' => Yii::t('app', 'Update User ID'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgent()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'agent_id']);
    }
    
    /**
     * @inheritdoc
     * @return array mixed
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_on',
                'updatedAtAttribute' => 'updated_on',
                'value' => date('Y-m-d H:i:s'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'create_user_id',
                'updatedByAttribute' => 'update_user_id',
            ],
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }



    /**
     * @inheritdoc
     * @return \app\modules\admin\models\AgentDetailsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\AgentDetailsQuery(get_called_class());
    }
public function asJson(){
    $data = [] ; 
            $data['id'] =  $this->id;
        
                $data['agent_id'] =  $this->agent_id;
        
                $data['no_of_bank_tied'] =  $this->no_of_bank_tied;
        
                $data['partner_type'] =  $this->partner_type;
        
                $data['team_members'] =  $this->team_members;
        
                $data['roi'] =  $this->roi;
        
                $data['commission_form'] =  $this->commission_form;
        
                $data['document_verifcation'] =  $this->document_verifcation;
        
                $data['consulation_fee'] =  $this->consulation_fee;
        
                $data['customers_served_till'] =  $this->customers_served_till;
        
                $data['certified_dsa'] =  $this->certified_dsa;
        
                $data['avg_processing_day'] =  $this->avg_processing_day;
        
                $data['doorstep_service'] =  $this->doorstep_service;
        
                $data['loan_offer'] =  $this->loan_offer;
        
                $data['establishment_year'] =  $this->establishment_year;
        
                $data['quick_solution'] =  $this->quick_solution;
        
                $data['status'] =  $this->status;
        
                $data['created_on'] =  $this->created_on;
        
                $data['updated_on'] =  $this->updated_on;
        
                $data['create_user_id'] =  $this->create_user_id;
        
                $data['update_user_id'] =  $this->update_user_id;
        
            return $data;
}


}


