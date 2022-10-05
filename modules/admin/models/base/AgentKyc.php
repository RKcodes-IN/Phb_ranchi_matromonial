<?php


namespace app\modules\admin\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;
/**
 * This is the base model class for table "agent_kyc".
 *
 * @property integer $id
 * @property integer $agent_id
 * @property string $pancard_no
 * @property string $pancard_image
 * @property string $aadhar_no
 * @property string $aadhar_front
 * @property string $aadhar_back
 * @property string $selfe
 * @property integer $pan_status
 * @property integer $aadhar_status
 * @property integer $selfie_status
 * @property integer $status
 * @property integer $created_on
 * @property integer $updated_on
 * @property integer $create_user_id
 * @property integer $update_user_id
 *
 * @property \app\models\User $agent
 */
class AgentKyc extends \yii\db\ActiveRecord
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
            [['agent_id', 'pancard_no', 'pancard_image', 'aadhar_no', 'aadhar_front', 'aadhar_back', 'selfe', 'pan_status', 'aadhar_status', 'selfie_status'], 'required'],
            [['agent_id', 'pan_status', 'aadhar_status', 'selfie_status', 'status', 'created_on', 'updated_on', 'create_user_id', 'update_user_id'], 'integer'],
            [['pancard_no', 'pancard_image', 'aadhar_no', 'aadhar_front', 'aadhar_back', 'selfe'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agent_kyc';
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
            'pancard_no' => Yii::t('app', 'Pancard No'),
            'pancard_image' => Yii::t('app', 'Pancard Image'),
            'aadhar_no' => Yii::t('app', 'Aadhar No'),
            'aadhar_front' => Yii::t('app', 'Aadhar Front'),
            'aadhar_back' => Yii::t('app', 'Aadhar Back'),
            'selfe' => Yii::t('app', 'Selfe'),
            'pan_status' => Yii::t('app', 'Pan Status'),
            'aadhar_status' => Yii::t('app', 'Aadhar Status'),
            'selfie_status' => Yii::t('app', 'Selfie Status'),
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
     * @return \app\modules\admin\models\AgentKycQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\AgentKycQuery(get_called_class());
    }
public function asJson(){
    $data = [] ; 
            $data['id'] =  $this->id;
        
                $data['agent_id'] =  $this->agent_id;
        
                $data['pancard_no'] =  $this->pancard_no;
        
                $data['pancard_image'] =  $this->pancard_image;
        
                $data['aadhar_no'] =  $this->aadhar_no;
        
                $data['aadhar_front'] =  $this->aadhar_front;
        
                $data['aadhar_back'] =  $this->aadhar_back;
        
                $data['selfe'] =  $this->selfe;
        
                $data['pan_status'] =  $this->pan_status;
        
                $data['aadhar_status'] =  $this->aadhar_status;
        
                $data['selfie_status'] =  $this->selfie_status;
        
                $data['status'] =  $this->status;
        
                $data['created_on'] =  $this->created_on;
        
                $data['updated_on'] =  $this->updated_on;
        
                $data['create_user_id'] =  $this->create_user_id;
        
                $data['update_user_id'] =  $this->update_user_id;
        
            return $data;
}


}


