<?php

use app\models\User;
use janisto\timepicker\TimePicker;
use kartik\date\DatePicker;
use kartik\file\FileInput;
use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\time\TimePicker as TimeTimePicker;
use kartik\widgets\TimePicker as WidgetsTimePicker;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\UserDetail */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget([
    'viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'UserSibling',
        'relID' => 'user-sibling',
        'value' => \yii\helpers\Json::encode($model->userSiblings),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="user-detail-form">



    <?php $form = ActiveForm::begin([
        'id' => 'login-form-inline',
        'type' => ActiveForm::TYPE_VERTICAL,
        'tooltipStyleFeedback' => true, // shows tooltip styled validation error feedback
        'fieldConfig' => ['options' => ['class' => 'form-group col-xs-6 col-sm-6 col-md-6 col-lg-12']], // spacing field groups
        'formConfig' => ['showErrors' => true],
        // // set style for proper tooltips error display
        'options' => ['data-pjax' => false],
        'enableAjaxValidation' => false,
    ]); ?>
    <?= $form->errorSummary($model); ?>
    <?= $form->errorSummary($user); ?>

    <div class="card p-2">
        <div class="card-title">
            <h4 class="bg-secondary p-1 rounded">Create User Profile</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <?= $form->field($user, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                    <?= $form->field($user, 'first_name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($user, 'username', ['enableAjaxValidation' => false]); ?>
                    <?= $form->field($user, 'password')->passwordInput() ?>

                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <?= $form->field($user, 'last_name')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($user, 'email')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($user, 'passwordRepeat')->passwordInput() ?>

                </div>
            </div>
        </div>
    </div>




    <div class="card p-2">
        <div class="card-title">
            <h4 class="bg-secondary p-1 rounded">Create User Details</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
                    <?= $form->field($model, 'register_number')->textInput(['maxlength' => true, 'placeholder' => 'Registration Number']) ?>

                    <?= $form->field($model, 'category')->dropDownList($model->getCategoryOption()) ?>
                    <?= $form->field($model, 'cast')->dropDownList($model->getCastOption()) ?>
                    <?= $form->field($model, 'cast_gotra')->textInput(['maxlength' => true, 'placeholder' => 'Cast Gotra']) ?>
                    <?= $form->field($model, 'tob')->widget(WidgetsTimePicker::className(), [
                        'options' => ['placeholder' => 'Select date ...'],

                    ])->label('Time Of Birth'); ?>
                    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true, 'placeholder' => 'Phone Number']) ?>
                    <?= $form->field($model, 'height')->textInput(['maxlength' => true, 'placeholder' => 'Height']) ?>
                    <?= $form->field($model, 'address')->textInput(['maxlength' => true, 'placeholder' => 'Address']) ?>
                    <?= $form->field($model, 'qualification')->textInput(['maxlength' => true, 'placeholder' => 'Qualification']) ?>
                    <?= $form->field($model, 'physique')->textInput(['maxlength' => true, 'placeholder' => 'Physique']) ?>
                    <?= $form->field($model, 'monthly_income')->textInput(['placeholder' => 'Monthly Income']) ?>
                    <?= $form->field($model, 'no_children')->textInput(['placeholder' => 'No Children'])->label('Number Of Children') ?>
                    <?= $form->field($model, 'disability_description')->textInput(['maxlength' => true, 'placeholder' => 'Disability Description']) ?>


                    <?= $form->field($model, 'profile_image')->widget(FileInput::classname(), [
                        'options' => ['multiple' => false, 'accept' => 'image/*'],
                        'pluginOptions' => [
                            'previewFileType' => 'logo', 'initialPreview' => [
                                $model->profile_image
                            ],
                            'initialPreviewAsData' => true,

                            'overwriteInitial' => true,

                            'showUpload' => false,
                        ]
                    ]);
                    ?>
                    <p>Image size could not be more than 2 MB</p>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <?= $form->field($model, 'marital_status')->dropDownList($model->getMatrialStatusOption()) ?>
                    <?= $form->field($model, 'gender')->dropDownList($model->getGenderOption()) ?>
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>
                    <?= $form->field($model, 'dob')->widget(DatePicker::className(), [
                        'value' => date('d-M-Y', strtotime('+2 days')),
                        'options' => ['placeholder' => 'Select date ...'],
                        'pluginOptions' => [
                            'format' => 'dd-mm-yyyy',
                            'todayHighlight' => true
                        ]
                    ])->label('Date Of Birth'); ?>
                    <?= $form->field($model, 'place_of_birth')->textInput(['maxlength' => true, 'placeholder' => 'Place Of Birth']) ?>
                    <?= $form->field($model, 'whats_app_number')->textInput(['maxlength' => true, 'placeholder' => 'Whats App Number']) ?>
                    <?= $form->field($model, 'house_type')->dropDownList($model->getHouseOption())->label('House Type') ?>
                    <?= $form->field($model, 'complexion')->dropDownList($model->getComplectionOption()) ?>
                    <?= $form->field($model, 'other_qualification')->textInput(['maxlength' => true, 'placeholder' => 'Other Qualification']) ?>
                    <?= $form->field($model, 'occupication')->textInput(['maxlength' => true, 'placeholder' => 'Occupication']) ?>
                    <?= $form->field($model, 'prefrence')->textInput(['maxlength' => true, 'placeholder' => 'Prefrence'])->label('Preferance') ?>
                    <?= $form->field($model, 'handicapped')->dropDownList(['0' => 'Select..', '1' => 'Yes', '2' => 'No']) ?>
                    <?= $form->field($model, 'status')->dropDownList($model->getStateOptions()) ?>

                </div>
            </div>
        </div>
    </div>



    <div class="card p-2">
        <div class="card-title">
            <h4 class="bg-secondary p-1 rounded">Family Details</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <?= $form->field($model, 'fathers_name')->textInput(['maxlength' => true, 'placeholder' => 'Fathers Name']) ?>
                    <?= $form->field($model, 'fathers_occupation')->textInput(['maxlength' => true, 'placeholder' => 'Fathers Occupation']) ?>

                    <?= $form->field($model, 'mothers_name')->textInput(['maxlength' => true, 'placeholder' => 'Mothers Name']) ?>
                    <?= $form->field($model, 'mothers_occupation')->textInput(['maxlength' => true, 'placeholder' => 'Mothers Occupation']) ?>

                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <?= $form->field($model, 'fathers_age')->textInput(['maxlength' => true, 'placeholder' => 'Fathers Age']) ?>
                    <?= $form->field($model, 'fathers_monthly_income')->textInput(['maxlength' => true, 'placeholder' => 'Fathers Monthly Income']) ?>

                    <?= $form->field($model, 'mothers_age')->textInput(['maxlength' => true, 'placeholder' => 'Mothers Age']) ?>
                    <?= $form->field($model, 'mothers_monthly_income')->textInput(['maxlength' => true, 'placeholder' => 'Mothers Monthly Income']) ?>


                </div>
            </div>
        </div>
    </div>

     <?php
                                        $forms = [
                                            [
                                                'label' => '<i class="fa fa-book"></i> ' . Html::encode(Yii::t('app', 'UserSibling')),
                                                'content' => $this->render('_formUserSibling', [
                                                    'row' => \yii\helpers\ArrayHelper::toArray($model->userSiblings),
                                                ]),
                                            ],
                                        ];
                                        echo kartik\tabs\TabsX::widget([
                                            'items' => $forms,
                                            'position' => kartik\tabs\TabsX::POS_ABOVE,
                                            'encodeLabels' => false,
                                            'pluginOptions' => [
                                                'bordered' => true,
                                                'sideways' => true,
                                                'enableCache' => false,
                                            ],
                                        ]);
                                        ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>