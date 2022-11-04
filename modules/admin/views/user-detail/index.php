<?php

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\search\UserDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use app\models\User;
use app\modules\admin\models\base\Banner;

use kartik\grid\GridView;

$this->title = Yii::t('app', 'User Details');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);


?>
<div class="user-detail-index">
    <div class="card">
        <div class="card-body">

            <?php // echo $this->render('_search', ['model' => $searchModel]); 
            ?>

            <p>
                <?php if (\Yii::$app->user->identity->user_role == User::ROLE_ADMIN || \Yii::$app->user->identity->user_role == User::ROLE_SUBADMIN) { ?>
                    <?= Html::a(Yii::t('app', 'Create User Detail'), ['create'], ['class' => 'btn btn-success']) ?>
                <?php  } ?>
                <?= Html::a(Yii::t('app', 'Advance Search'), '#', ['class' => 'btn btn-info search-button']) ?>
            </p>
            <div class="search-form" style="display:none">
                <?= $this->render('_search', ['model' => $searchModel]); ?>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <?php
            $gridColumn = [
                
                ['class' => 'yii\grid\SerialColumn'],
                
                [
                    'class' => 'kartik\grid\ActionColumn',
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            if (\Yii::$app->user->identity->user_role == User::ROLE_ADMIN || \Yii::$app->user->identity->user_role == User::ROLE_SUBADMIN || \Yii::$app->user->identity->user_role == User::ROLE_MANAGER) {
                                return Html::a('<span class="fas fa-eye" aria-hidden="true"></span>', $url);
                            }
                        },
                        'update' => function ($url, $model) {
                            if (\Yii::$app->user->identity->user_role == User::ROLE_ADMIN || \Yii::$app->user->identity->user_role == User::ROLE_SUBADMIN || \Yii::$app->user->identity->user_role == User::ROLE_MANAGER) {
                                return Html::a('<span class="fas fa-pencil-alt" aria-hidden="true"></span>', $url);
                            }
                        },
                        'delete' => function ($url, $model) {
                            if (\Yii::$app->user->identity->user_role == User::ROLE_ADMIN || \Yii::$app->user->identity->user_role == User::ROLE_SUBADMIN) {
                                return Html::a('<span class="fas fa-trash-alt" aria-hidden="true"></span>', $url, [
                                    'data' => [
                                        'method' => 'post',
                                        // use it if you want to confirm the action
                                        'confirm' => 'Are you sure?',
                                    ],
                                ]);
                            }
                        },


                    ]



                ],
                ['attribute' => 'id', 'visible' => false],

                [
                    'attribute' => 'user_id',
                    'label' => Yii::t('app', 'User'),
                    'value' => function ($model) {
                        return $model->user->id;
                    },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->asArray()->all(), 'id', 'id'),
                    'filterWidgetOptions' => [
                        'pluginOptions' => ['allowClear' => true],
                    ],
                    'filterInputOptions' => ['placeholder' => 'User', 'id' => 'grid-user-detail-search-user_id']
                ],
                'name',

                'register_number',

                // 'marital_status',
                [
                    'attribute' => 'profile_image',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Html::img(
                            $model['profile_image'],
                            [
                                'width' => '100px',
                                'height' => '100px'
                            ]
                        );
                    },


                ],

                [
                    'attribute' => 'marital_status',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return '<div class="badge badge-info">'. $model->getMatrialStatusBadges().'</div>';
                    },


                ],

                [
                    'attribute' => 'category',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return '<div class="badge badge-success">'. $model->getCategoryBadges().'</div>';
                    },


                ],

               

                [
                    'attribute' => 'gender',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return '<div class="badge badge-warning">'. $model->getGenderBadges().'</div>';
                    },


                ],

                [
                    'attribute' => 'cast',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return '<div class="badge badge-primary">'. $model->getCastBadges().'</div>';
                    },


                ],


                'cast_gotra',
                // 'dob',

                // 'tob',

                'place_of_birth',

                'phone_number',

                // 'whats_app_number',

                // 'height',

                // 'house_type',

                'address',

                // 'complexion',

                // 'qualification',

                // 'other_qualification',

                // 'physique',

                // 'occupication',

                // 'monthly_income',

                // 'prefrence',

                // 'no_children',

                // 'handicapped',

                // 'disability_description',

                'fathers_name',

                // 'fathers_occupation',

                // 'fathers_age',

                // 'fathers_monthly_income',

                'mothers_name',

                // 'mothers_occupation',

                // 'mothers_age',

                'mothers_monthly_income',

                // 'upload_kundli',

                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return $model->getStateOptionsBadges();
                    },


                ],
               
            ];
            ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => $gridColumn,
                'pjax' => true,
                'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-user-detail']],
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
                ],
                'export' => false,
                // your toolbar can include the additional full export menu
                'toolbar' => [
                    '{export}',
                    ExportMenu::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => $gridColumn,
                        'target' => ExportMenu::TARGET_BLANK,
                        'fontAwesome' => true,
                        'dropdownOptions' => [
                            'label' => 'Full',
                            'class' => 'btn btn-default',
                            'itemsBefore' => [
                                '<li class="dropdown-header">Export All Data</li>',
                            ],
                        ],
                        'exportConfig' => [
                            ExportMenu::FORMAT_PDF => false
                        ]
                    ]),
                ],
            ]); ?>
        </div>
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).on('change', 'select[id^=status_list_]', function() {
        var id = $(this).attr('data-id');
        var val = $(this).val();

        $.ajax({
            type: "POST",

            url: "/phbhindi/gii/default/status-change",


            data: {
                id: id,
                val: val
            },
            success: function(data) {
                swal("Good job!", "Status Successfully Changed!", "success");
            }
        });
    });
</script>