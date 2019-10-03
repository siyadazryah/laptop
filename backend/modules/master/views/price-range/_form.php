<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PriceRange */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="price-range-form">
    <?= \common\components\AlertMessageWidget::widget() ?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
             <?= $form->field($model, 'price')->textInput(['type' => 'number', 'min' => '0', 'autocomplete' => 'off']) ?>
        </div>

        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'status')->dropDownList(['1' => 'Enabled', '0' => 'Disabled']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-success', 'style' => 'float:right;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
