<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\UserDetail */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-detail-view">
<div class="card">
       <div class="card-body">
    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'User Detail').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                          <?php  if(\Yii::$app->user->identity->user_role==User::ROLE_ADMIN || \Yii::$app->user->identity->user_role==User::ROLE_SUBADMIN){ ?>
             <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>  
             <?php  } ?>
        </div>
    </div>
    </div>
    </div>
    <div class="card">
       <div class="card-body">

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
            'attribute' => 'user.id',
            'label' => Yii::t('app', 'User'),
        ],
        'register_number',
        'marital_status',
        'category',
        'profile_image',
        'gender',
        'cast',
        'name',
        'cast_gotra',
        'dob',
        'tob',
        'place_of_birth',
        'phone_number',
        'whats_app_number',
        'height',
        'house_type',
        'address',
        'complexion',
        'qualification',
        'other_qualification',
        'physique',
        'occupication',
        'monthly_income',
        'prefrence',
        'no_children',
        'handicapped',
        'disability_description',
        'fathers_name',
        'fathers_occupation',
        'fathers_age',
        'fathers_monthly_income',
        'mothers_name',
        'mothers_occupation',
        'mothers_age',
        'mothers_monthly_income',
        'upload_kundli',
        'status',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
</div>
</div>
    </div>
    <div class="card">
       <div class="card-body">
    <div class="row">
        <h4>User<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUser = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'auth_key',
        'password_hash',
        'password_reset_token',
        'email',
        'first_name',
        'last_name',
        'profile_image',
        'user_role',
        'status',
        'created_at',
        'updated_at',
    ];
    echo DetailView::widget([
        'model' => $model->user,
        'attributes' => $gridColumnUser    ]);
    ?>
    </div>
    </div>
    <div class="card">
       <div class="card-body">
    <div class="row">
<?php
if($providerUserSibling->totalCount){
    $gridColumnUserSibling = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            [
                'attribute' => 'user.id',
                'label' => Yii::t('app', 'User')
            ],
                        [
                'attribute' => 'siblingType.id',
                'label' => Yii::t('app', 'Sibling Type')
            ],
            'name',
            'age',
            'education_qulification',
            'married',
            'occupation',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerUserSibling,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-user-sibling']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'User Sibling')),
        ],
        'export' => false,
        'columns' => $gridColumnUserSibling
    ]);
}

?>
</div>
</div>
</div>

</div>

