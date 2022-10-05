<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\AgentDetails */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="agent-details-form">

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

    <?= $form->field($model, 'no_of_bank_tied')->textInput(['placeholder' => 'No Of Bank Tied']) ?>

    <?= $form->field($model, 'partner_type')->textInput(['maxlength' => true, 'placeholder' => 'Partner Type']) ?>

    <?= $form->field($model, 'team_members')->textInput(['placeholder' => 'Team Members']) ?>

    <?= $form->field($model, 'roi')->textInput(['maxlength' => true, 'placeholder' => 'Roi']) ?>

    <?= $form->field($model, 'commission_form')->textInput(['maxlength' => true, 'placeholder' => 'Commission Form']) ?>

    <?= $form->field($model, 'document_verifcation')->textInput(['placeholder' => 'Document Verifcation']) ?>

    <?= $form->field($model, 'consulation_fee')->textInput(['placeholder' => 'Consulation Fee']) ?>

    <?= $form->field($model, 'customers_served_till')->textInput(['placeholder' => 'Customers Served Till']) ?>

    <?= $form->field($model, 'certified_dsa')->textInput(['placeholder' => 'Certified Dsa']) ?>

    <?= $form->field($model, 'avg_processing_day')->textInput(['placeholder' => 'Avg Processing Day']) ?>

    <?= $form->field($model, 'doorstep_service')->textInput(['placeholder' => 'Doorstep Service']) ?>

    <?= $form->field($model, 'loan_offer')->textInput(['placeholder' => 'Loan Offer']) ?>

    <?= $form->field($model, 'establishment_year')->textInput(['placeholder' => 'Establishment Year']) ?>

    <?= $form->field($model, 'quick_solution')->textInput(['placeholder' => 'Quick Solution']) ?>

    <?= $form->field($model, 'status')->dropDownList($model->getStateOptions()) ?>

<?php if($model->isNewRecord){ ?><?php } ?>    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
  
    <?php ActiveForm::end(); ?>

</div>
