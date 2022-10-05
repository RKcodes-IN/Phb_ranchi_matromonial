<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\search\AgentKycSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-agent-kyc-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'agent_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
        'options' => ['placeholder' => Yii::t('app', 'Choose User')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'pancard_no')->textInput(['maxlength' => true, 'placeholder' => 'Pancard No']) ?>

    <?= $form->field($model, 'pancard_image')->textInput(['maxlength' => true, 'placeholder' => 'Pancard Image']) ?>

    <?= $form->field($model, 'aadhar_no')->textInput(['maxlength' => true, 'placeholder' => 'Aadhar No']) ?>

    <?php /* echo $form->field($model, 'aadhar_front')->textInput(['maxlength' => true, 'placeholder' => 'Aadhar Front']) */ ?>

    <?php /* echo $form->field($model, 'aadhar_back')->textInput(['maxlength' => true, 'placeholder' => 'Aadhar Back']) */ ?>

    <?php /* echo $form->field($model, 'selfe')->textInput(['maxlength' => true, 'placeholder' => 'Selfe']) */ ?>

    <?php /* echo $form->field($model, 'pan_status')->textInput(['placeholder' => 'Pan Status']) */ ?>

    <?php /* echo $form->field($model, 'aadhar_status')->textInput(['placeholder' => 'Aadhar Status']) */ ?>

    <?php /* echo $form->field($model, 'selfie_status')->textInput(['placeholder' => 'Selfie Status']) */ ?>

    <?php /* echo $form->field($model, 'status')->dropDownList($model->getStateOptions()) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
