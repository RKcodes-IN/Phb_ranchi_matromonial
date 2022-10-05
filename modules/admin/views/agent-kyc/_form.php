<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\AgentKyc */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="agent-kyc-form">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form-inline', 
        'type' => ActiveForm::TYPE_VERTICAL,
        'tooltipStyleFeedback' => true, // shows tooltip styled validation error feedback
        'fieldConfig' => ['options' => ['class' => 'form-group col-xs-6 col-sm-6 col-md-6 col-lg-12']], // spacing field groups
        'formConfig' => ['showErrors' => true],
        // set style for proper tooltips error display
    ]); ?>
  
    <?= $form->errorSummary($model); ?>
  
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

    <?= $form->field($model, 'aadhar_front')->textInput(['maxlength' => true, 'placeholder' => 'Aadhar Front']) ?>

    <?= $form->field($model, 'aadhar_back')->textInput(['maxlength' => true, 'placeholder' => 'Aadhar Back']) ?>

    <?= $form->field($model, 'selfe')->textInput(['maxlength' => true, 'placeholder' => 'Selfe']) ?>

    <?= $form->field($model, 'pan_status')->textInput(['placeholder' => 'Pan Status']) ?>

    <?= $form->field($model, 'aadhar_status')->textInput(['placeholder' => 'Aadhar Status']) ?>

    <?= $form->field($model, 'selfie_status')->textInput(['placeholder' => 'Selfie Status']) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStateOptions()) ?>

<?php if($model->isNewRecord){ ?><?php } ?>    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
  
    <?php ActiveForm::end(); ?>

</div>
