<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\UserDetail */

$this->title = Yii::t('app', 'Create User Detail');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-detail-create">
    <div class="card">
       <div class="card-body">
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
    ]) ?>
    </div>
    </div>
</div>
