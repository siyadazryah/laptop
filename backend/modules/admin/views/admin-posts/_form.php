<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AdminPosts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-posts-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= \common\components\AlertMessageWidget::widget() ?>
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>    
            <?= $form->field($model, 'post_name')->textInput(['maxlength' => true]) ?>

        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'> 
            <?= $form->field($model, 'status')->dropDownList(['' => '--Select--', '1' => 'Enabled', '0' => 'Disabled']) ?>

        </div> 
        <div class='col-md-12 col-sm-12 col-xs-12 left_padd'>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-success', 'style' => 'float: right;']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
