<?php
use app\modules\admin\models\Page;


if (! empty($model)) {
    echo $model->description;
} else {
    echo \Yii::t('app', 'No data found');
}
?>
