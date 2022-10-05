<?php


namespace app\modules\admin\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;
/**
 * This is the base model class for table "user_sibling".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $user_detail_id
 * @property integer $sibling_type_id
 * @property string $name
 * @property string $age
 * @property string $education_qulification
 * @property integer $married
 * @property string $occupation
 * @property integer $created_on
 * @property integer $updated_on
 * @property string $create_user_id
 * @property string $update_user_id
 *
 * @property \app\modules\admin\models\SiblingType $siblingType
 * @property \app\modules\admin\models\UserDetail $userDetail
 * @property \app\modules\admin\models\User $user
 */
class UserSibling extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'siblingType',
            'userDetail',
            'user'
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
            [['id', 'user_id', 'user_detail_id', 'sibling_type_id', 'name', 'age', 'education_qulification', 'married', 'occupation', 'created_on', 'updated_on', 'create_user_id', 'update_user_id'], 'required'],
            [['id', 'user_id', 'user_detail_id', 'sibling_type_id', 'married', 'created_on', 'updated_on'], 'integer'],
            [['create_user_id', 'update_user_id'], 'safe'],
            [['name', 'age', 'education_qulification', 'occupation'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_sibling';
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
            'user_id' => Yii::t('app', 'User ID'),
            'user_detail_id' => Yii::t('app', 'User Detail ID'),
            'sibling_type_id' => Yii::t('app', 'Sibling Type ID'),
            'name' => Yii::t('app', 'Name'),
            'age' => Yii::t('app', 'Age'),
            'education_qulification' => Yii::t('app', 'Education Qulification'),
            'married' => Yii::t('app', 'Married'),
            'occupation' => Yii::t('app', 'Occupation'),
            'created_on' => Yii::t('app', 'Created On'),
            'updated_on' => Yii::t('app', 'Updated On'),
            'create_user_id' => Yii::t('app', 'Create User ID'),
            'update_user_id' => Yii::t('app', 'Update User ID'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiblingType()
    {
        return $this->hasOne(\app\modules\admin\models\SiblingType::className(), ['id' => 'sibling_type_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserDetail()
    {
        return $this->hasOne(\app\modules\admin\models\UserDetail::className(), ['id' => 'user_detail_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id']);
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
            // 'uuid' => [
            //     'class' => UUIDBehavior::className(),
            //     'column' => 'id',
            // ],
        ];
    }



    /**
     * @inheritdoc
     * @return \app\modules\admin\models\UserSiblingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\UserSiblingQuery(get_called_class());
    }
public function asJson(){
    $data = [] ; 
            $data['id'] =  $this->id;
        
                $data['user_id'] =  $this->user_id;
        
                $data['user_detail_id'] =  $this->user_detail_id;
        
                $data['sibling_type_id'] =  $this->sibling_type_id;
        
                $data['name'] =  $this->name;
        
                $data['age'] =  $this->age;
        
                $data['education_qulification'] =  $this->education_qulification;
        
                $data['married'] =  $this->married;
        
                $data['occupation'] =  $this->occupation;   
        
                $data['created_on'] =  $this->created_on;
        
                $data['updated_on'] =  $this->updated_on;
        
                $data['create_user_id'] =  $this->create_user_id;
        
                $data['update_user_id'] =  $this->update_user_id;
        
            return $data;
}


}


