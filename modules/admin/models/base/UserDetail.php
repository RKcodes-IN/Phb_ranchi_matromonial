<?php


namespace app\modules\admin\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "user_detail".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $register_number
 * @property integer $marital_status
 * @property integer $category
 * @property string $profile_image
 * @property integer $gender
 * @property integer $cast
 * @property string $name
 * @property string $cast_gotra
 * @property string $dob
 * @property string $tob
 * @property string $place_of_birth
 * @property string $phone_number
 * @property string $whats_app_number
 * @property string $height
 * @property string $house_type
 * @property string $address
 * @property integer $complexion
 * @property string $qualification
 * @property string $other_qualification
 * @property string $physique
 * @property string $occupication
 * @property double $monthly_income
 * @property string $prefrence
 * @property integer $no_children
 * @property integer $handicapped
 * @property string $disability_description
 * @property string $fathers_name
 * @property string $fathers_occupation
 * @property string $fathers_age
 * @property string $fathers_monthly_income
 * @property string $mothers_name
 * @property string $mothers_occupation
 * @property string $mothers_age
 * @property string $mothers_monthly_income
 * @property string $upload_kundli
 * @property integer $status
 * @property integer $created_on
 * @property integer $updated_on
 * @property string $create_user_id
 * @property string $update_user_id
 *
 * @property \app\modules\admin\models\User $user
 * @property \app\modules\admin\models\UserSibling[] $userSiblings
 */
class UserDetail extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
     * This function helps \mootensai\relation\RelationTrait runs faster
     * @return array relation names of this model
     */
    public function relationNames()
    {
        return [
            'user',
            'userSiblings'
        ];
    }

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETE = 2;

    const IS_FEATURED = 1;
    const IS_NOT_FEATURED = 0;



    const UNMARRIED = 1;
    const DIVORCE = 2;
    const WIDOW = 3;
    const WIDOWER = 4;

    const MANGLIK = 1;
    const NON_MANGLIK = 2;

    const MALE = 1;
    const FEMALE = 2;

    const SIKH = 1;
    const KHATRI = 2;
    const ARORA = 3;
    const BRAHMIN = 4;
    const OTHER = 5;

    const VERY_FAIR = 1;
    const FAIR = 2;
    const WITISH = 3;
    const DARK = 4;

    const HOUSE_RENTED = 1;
    const HOUSE_OWNED = 2;
     
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'marital_status', 'category', 'profile_image', 'gender', 'cast', 'name', 'cast_gotra', 'dob', 'tob', 'place_of_birth', 'phone_number', 'whats_app_number', 'height', 'house_type', 'address', 'complexion', 'qualification', 'other_qualification', 'physique', 'occupication', 'monthly_income', 'prefrence', 'no_children', 'handicapped', 'disability_description', 'fathers_name', 'fathers_occupation', 'fathers_age', 'fathers_monthly_income', 'mothers_name', 'mothers_occupation', 'mothers_age', 'mothers_monthly_income', 'status',], 'required'],
            [['user_id', 'marital_status', 'category', 'gender', 'cast', 'complexion', 'no_children', 'handicapped', 'status', 'created_on', 'updated_on'], 'integer'],
            [['monthly_income'], 'number'],
            [['user_id', 'create_user_id', 'update_user_id', 'upload_kundli','register_number', ], 'safe'],
            [['register_number', 'profile_image', 'name', 'cast_gotra', 'dob', 'tob', 'place_of_birth', 'phone_number', 'whats_app_number', 'height', 'address', 'qualification', 'other_qualification', 'physique', 'occupication', 'prefrence', 'disability_description', 'fathers_name', 'fathers_occupation', 'fathers_age', 'fathers_monthly_income', 'mothers_name', 'mothers_occupation', 'mothers_age', 'mothers_monthly_income', 'upload_kundli'], 'string', 'max' => 255],
            [['house_type'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_detail';
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
        } elseif ($this->status == self::STATUS_DELETE) {
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
    // Material Status

    public function getMatrialStatusOption()
    {
        return [

            self::UNMARRIED => 'UNMARRIED',
            self::DIVORCE => 'Divorce',
            self::WIDOW => 'Widow',
            self::WIDOWER => 'Widower',

        ];
    }
    public function getMatrialStatusBadges()
    {

        if ($this->marital_status == self::UNMARRIED) {
            return 'UNMARRIED';
        } elseif ($this->marital_status == self::DIVORCE) {
            return 'Divorce';
        } elseif ($this->marital_status == self::WIDOW) {
            return 'Widow';
        } elseif ($this->marital_status == self::WIDOWER) {
            return 'Widower';
        }
    }

    // category


    public function getCategoryOption()
    {
        return [

            self::MANGLIK => 'Manglik',
            self::NON_MANGLIK => 'Non Manglik',


        ];
    }
    public function getCategoryBadges()
    {

        if ($this->category == self::MANGLIK) {
            return 'Manglik';
        } elseif ($this->category == self::NON_MANGLIK) {
            return 'Non Manglik';
        }
    }



    // category

    public function getGenderOption()
    {
        return [

            self::MALE => 'Male',
            self::FEMALE => 'Female',


        ];
    }
    public function getGenderBadges()
    {

        if ($this->gender == self::MALE) {
            return 'Male';
        } elseif ($this->gender == self::FEMALE) {
            return 'Female';
        }
    }


    // Cast

    public function getCastOption()
    {
        return [

            self::SIKH => 'Sikh',
            self::KHATRI => 'Khatri',
            self::ARORA => 'Arora',
            self::BRAHMIN => 'Brahmin',
            self::OTHER => 'Other',


        ];
    }
    public function getCastBadges()
    {

        if ($this->cast == self::SIKH) {
            return 'Sikh';
        } elseif ($this->cast == self::KHATRI) {
            return 'Khatri';
        } elseif ($this->cast == self::ARORA) {
            return 'Arora';
        } elseif ($this->cast == self::BRAHMIN) {
            return 'Brahmin';
        } elseif ($this->cast == self::OTHER) {
            return 'Other';
        }
    }

    public function getComplectionOption()
    {
        return [

            self::VERY_FAIR => 'Very Fair',
            self::FAIR => 'Fair',
            self::WITISH => 'Witish',
            self::DARK => 'Dark',


        ];
    }
    public function getComplectionBadges()
    {

        if ($this->complexion == self::VERY_FAIR) {
            return '<span class="badge badge-success">Very Fair</span>';
        } elseif ($this->complexion == self::FAIR) {
            return '<span class="badge badge-default">Fair</span>';
        } elseif ($this->complexion == self::WITISH) {
            return '<span class="badge badge-default">Witish</span>';
        } elseif ($this->complexion == self::DARK) {
            return '<span class="badge badge-default">Dark</span>';
        }
    }

    public function getHouseOption()
    {
        return [

            self::HOUSE_RENTED => 'Rented',
            self::HOUSE_OWNED => 'Owned',



        ];
    }
    public function getHouseBadges()
    {

        if ($this->house_type == self::HOUSE_RENTED) {
            return '<span class="badge badge-success">Rented</span>';
        } elseif ($this->house_type == self::HOUSE_OWNED) {
            return '<span class="badge badge-default">Owned</span>';
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
            'register_number' => Yii::t('app', 'Register Number'),
            'marital_status' => Yii::t('app', 'Marital Status'),
            'category' => Yii::t('app', 'Category'),
            'profile_image' => Yii::t('app', 'Profile Image'),
            'gender' => Yii::t('app', 'Gender'),
            'cast' => Yii::t('app', 'Cast'),
            'name' => Yii::t('app', 'Name'),
            'cast_gotra' => Yii::t('app', 'Cast Gotra'),
            'dob' => Yii::t('app', 'Dob'),
            'tob' => Yii::t('app', 'Tob'),
            'place_of_birth' => Yii::t('app', 'Place Of Birth'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'whats_app_number' => Yii::t('app', 'Whats App Number'),
            'height' => Yii::t('app', 'Height'),
            'house_type' => Yii::t('app', 'House Type'),
            'address' => Yii::t('app', 'Address'),
            'complexion' => Yii::t('app', 'Complexion'),
            'qualification' => Yii::t('app', 'Qualification'),
            'other_qualification' => Yii::t('app', 'Other Qualification'),
            'physique' => Yii::t('app', 'Physique'),
            'occupication' => Yii::t('app', 'Occupication'),
            'monthly_income' => Yii::t('app', 'Monthly Income'),
            'prefrence' => Yii::t('app', 'Prefrence'),
            'no_children' => Yii::t('app', 'No Children'),
            'handicapped' => Yii::t('app', 'Handicapped'),
            'disability_description' => Yii::t('app', 'Disability Description'),
            'fathers_name' => Yii::t('app', 'Fathers Name'),
            'fathers_occupation' => Yii::t('app', 'Fathers Occupation'),
            'fathers_age' => Yii::t('app', 'Fathers Age'),
            'fathers_monthly_income' => Yii::t('app', 'Fathers Monthly Income'),
            'mothers_name' => Yii::t('app', 'Mothers Name'),
            'mothers_occupation' => Yii::t('app', 'Mothers Occupation'),
            'mothers_age' => Yii::t('app', 'Mothers Age'),
            'mothers_monthly_income' => Yii::t('app', 'Mothers Monthly Income'),
            'upload_kundli' => Yii::t('app', 'Upload Kundli'),
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
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSiblings()
    {
        return $this->hasMany(\app\modules\admin\models\UserSibling::className(), ['user_detail_id' => 'id']);
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

    public function getRegNo($id)
    {
        $start = 00001;
       

        $userDetail = UserDetail::find()->where(['id'=>$id])->one();
        $check = UserDetail::find()->where(['register_number'=>$userDetail->register_number])->one();
        if(empty($check)){
            $registrationNo = 'PHB-'.$start;
            var_dump($registrationNo);exit;
        }else{
            

        }
    }

    public function getAge($dob)
    {
        $date = date("Y-m-d");
        $diff = date_diff(date_create($dob),date_create($date));
        return $diff->format('%y');
    }

    /**
     * @inheritdoc
     * @return \app\modules\admin\models\UserDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\admin\models\UserDetailQuery(get_called_class());
    }


    public function asJson()
    {
        $data = [];
        $data['id'] =  $this->id;

        $data['user_id'] =  $this->user_id;

        $data['register_number'] =  $this->register_number;

        $data['marital_status'] =  $this->marital_status;

        $data['category'] =  $this->category;

        $data['profile_image'] =  $this->profile_image;

        $data['gender'] =  $this->gender;

        $data['cast'] =  $this->cast;

        $data['name'] =  $this->name;

        $data['cast_gotra'] =  $this->cast_gotra;

        $data['dob'] =  $this->dob;

        $data['tob'] =  $this->tob;

        $data['place_of_birth'] =  $this->place_of_birth;

        $data['phone_number'] =  $this->phone_number;

        $data['whats_app_number'] =  $this->whats_app_number;

        $data['height'] =  $this->height;

        $data['house_type'] =  $this->house_type;

        $data['address'] =  $this->address;

        $data['complexion'] =  $this->complexion;

        $data['qualification'] =  $this->qualification;

        $data['other_qualification'] =  $this->other_qualification;

        $data['physique'] =  $this->physique;

        $data['occupication'] =  $this->occupication;

        $data['monthly_income'] =  $this->monthly_income;

        $data['prefrence'] =  $this->prefrence;

        $data['no_children'] =  $this->no_children;

        $data['handicapped'] =  $this->handicapped;

        $data['disability_description'] =  $this->disability_description;

        $data['fathers_name'] =  $this->fathers_name;

        $data['fathers_occupation'] =  $this->fathers_occupation;

        $data['fathers_age'] =  $this->fathers_age;

        $data['fathers_monthly_income'] =  $this->fathers_monthly_income;

        $data['mothers_name'] =  $this->mothers_name;

        $data['mothers_occupation'] =  $this->mothers_occupation;

        $data['mothers_age'] =  $this->mothers_age;

        $data['mothers_monthly_income'] =  $this->mothers_monthly_income;

        $data['upload_kundli'] =  $this->upload_kundli;

        $data['status'] =  $this->status;

        $data['created_on'] =  $this->created_on;

        $data['updated_on'] =  $this->updated_on;

        $data['create_user_id'] =  $this->create_user_id;

        $data['update_user_id'] =  $this->update_user_id;

        return $data;
    }
}
