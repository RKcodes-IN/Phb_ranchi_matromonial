<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\search\AgentDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-agent-details-search">

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

    <?= $form->field($model, 'no_of_bank_tied')->textInput(['placeholder' => 'No Of Bank Tied']) ?>

    <?= $form->field($model, 'partner_type')->textInput(['maxlength' => true, 'placeholder' => 'Partner Type']) ?>

    <?= $form->field($model, 'team_members')->textInput(['placeholder' => 'Team Members']) ?>

    <?php /* echo $form->field($model, 'roi')->textInput(['maxlength' => true, 'placeholder' => 'Roi']) */ ?>

    <?php /* echo $form->field($model, 'commission_form')->textInput(['maxlength' => true, 'placeholder' => 'Commission Form']) */ ?>

    <?php /* echo $form->field($model, 'document_verifcation')->textInput(['placeholder' => 'Document Verifcation']) */ ?>

    <?php /* echo $form->field($model, 'consulation_fee')->textInput(['placeholder' => 'Consulation Fee']) */ ?>

    <?php /* echo $form->field($model, 'customers_served_till')->textInput(['placeholder' => 'Customers Served Till']) */ ?>

    <?php /* echo $form->field($model, 'certified_dsa')->textInput(['placeholder' => 'Certified Dsa']) */ ?>

    <?php /* echo $form->field($model, 'avg_processing_day')->textInput(['placeholder' => 'Avg Processing Day']) */ ?>

    <?php /* echo $form->field($model, 'doorstep_service')->textInput(['placeholder' => 'Doorstep Service']) */ ?>

    <?php /* echo $form->field($model, 'loan_offer')->textInput(['placeholder' => 'Loan Offer']) */ ?>

    <?php /* echo $form->field($model, 'establishment_year')->textInput(['placeholder' => 'Establishment Year']) */ ?>

    <?php /* echo $form->field($model, 'quick_solution')->textInput(['placeholder' => 'Quick Solution']) */ ?>

    <?php /* echo $form->field($model, 'status')->dropDownList($model->getStateOptions()) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
