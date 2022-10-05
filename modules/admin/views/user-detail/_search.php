<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\search\UserDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-user-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'register_number')->textInput(['maxlength' => true, 'placeholder' => 'Register Number']) ?>

    <?= $form->field($model, 'marital_status')->textInput(['placeholder' => 'Marital Status']) ?>

    <?= $form->field($model, 'category')->textInput(['placeholder' => 'Category']) ?>

    <?php /* echo $form->field($model, 'profile_image')->textInput(['maxlength' => true, 'placeholder' => 'Profile Image']) */ ?>

    <?php /* echo $form->field($model, 'gender')->textInput(['placeholder' => 'Gender']) */ ?>

    <?php /* echo $form->field($model, 'cast')->textInput(['placeholder' => 'Cast']) */ ?>

    <?php /* echo $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) */ ?>

    <?php /* echo $form->field($model, 'cast_gotra')->textInput(['maxlength' => true, 'placeholder' => 'Cast Gotra']) */ ?>

    <?php /* echo $form->field($model, 'dob')->textInput(['maxlength' => true, 'placeholder' => 'Dob']) */ ?>

    <?php /* echo $form->field($model, 'tob')->textInput(['maxlength' => true, 'placeholder' => 'Tob']) */ ?>

    <?php /* echo $form->field($model, 'place_of_birth')->textInput(['maxlength' => true, 'placeholder' => 'Place Of Birth']) */ ?>

    <?php /* echo $form->field($model, 'phone_number')->textInput(['maxlength' => true, 'placeholder' => 'Phone Number']) */ ?>

    <?php /* echo $form->field($model, 'whats_app_number')->textInput(['maxlength' => true, 'placeholder' => 'Whats App Number']) */ ?>

    <?php /* echo $form->field($model, 'height')->textInput(['maxlength' => true, 'placeholder' => 'Height']) */ ?>

    <?php /* echo $form->field($model, 'house_type')->textInput(['maxlength' => true, 'placeholder' => 'House Type']) */ ?>

    <?php /* echo $form->field($model, 'address')->textInput(['maxlength' => true, 'placeholder' => 'Address']) */ ?>

    <?php /* echo $form->field($model, 'complexion')->textInput(['placeholder' => 'Complexion']) */ ?>

    <?php /* echo $form->field($model, 'qualification')->textInput(['maxlength' => true, 'placeholder' => 'Qualification']) */ ?>

    <?php /* echo $form->field($model, 'other_qualification')->textInput(['maxlength' => true, 'placeholder' => 'Other Qualification']) */ ?>

    <?php /* echo $form->field($model, 'physique')->textInput(['maxlength' => true, 'placeholder' => 'Physique']) */ ?>

    <?php /* echo $form->field($model, 'occupication')->textInput(['maxlength' => true, 'placeholder' => 'Occupication']) */ ?>

    <?php /* echo $form->field($model, 'monthly_income')->textInput(['placeholder' => 'Monthly Income']) */ ?>

    <?php /* echo $form->field($model, 'prefrence')->textInput(['maxlength' => true, 'placeholder' => 'Prefrence']) */ ?>

    <?php /* echo $form->field($model, 'no_children')->textInput(['placeholder' => 'No Children']) */ ?>

    <?php /* echo $form->field($model, 'handicapped')->textInput(['placeholder' => 'Handicapped']) */ ?>

    <?php /* echo $form->field($model, 'disability_description')->textInput(['maxlength' => true, 'placeholder' => 'Disability Description']) */ ?>

    <?php /* echo $form->field($model, 'fathers_name')->textInput(['maxlength' => true, 'placeholder' => 'Fathers Name']) */ ?>

    <?php /* echo $form->field($model, 'fathers_occupation')->textInput(['maxlength' => true, 'placeholder' => 'Fathers Occupation']) */ ?>

    <?php /* echo $form->field($model, 'fathers_age')->textInput(['maxlength' => true, 'placeholder' => 'Fathers Age']) */ ?>

    <?php /* echo $form->field($model, 'fathers_monthly_income')->textInput(['maxlength' => true, 'placeholder' => 'Fathers Monthly Income']) */ ?>

    <?php /* echo $form->field($model, 'mothers_name')->textInput(['maxlength' => true, 'placeholder' => 'Mothers Name']) */ ?>

    <?php /* echo $form->field($model, 'mothers_occupation')->textInput(['maxlength' => true, 'placeholder' => 'Mothers Occupation']) */ ?>

    <?php /* echo $form->field($model, 'mothers_age')->textInput(['maxlength' => true, 'placeholder' => 'Mothers Age']) */ ?>

    <?php /* echo $form->field($model, 'mothers_monthly_income')->textInput(['maxlength' => true, 'placeholder' => 'Mothers Monthly Income']) */ ?>

    <?php /* echo $form->field($model, 'upload_kundli')->textInput(['maxlength' => true, 'placeholder' => 'Upload Kundli']) */ ?>

    <?php /* echo $form->field($model, 'status')->dropDownList($model->getStateOptions()) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
