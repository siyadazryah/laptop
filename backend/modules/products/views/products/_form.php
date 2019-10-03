<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Brands;
use common\models\ProcessorType;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class='col-md-6 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'canonical_name')->textInput(['maxlength' => true, 'readOnly' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'price')->textInput(['type' => 'number', 'min' => '0', 'step' => 'any', 'autocomplete' => 'off']) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'brand')->dropDownList(ArrayHelper::map(Brands::find()->where(['status' => '1'])->all(), 'id', 'name'), ['prompt' => 'select']); ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'processor_type')->dropDownList(ArrayHelper::map(ProcessorType::find()->where(['status' => '1'])->all(), 'id', 'name'), ['prompt' => 'select']); ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'screen')->textInput(['type' => 'number', 'min' => '0', 'step' => 'any', 'autocomplete' => 'off'])->label('Screen Size<i> (in inch)</i>') ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'touch_screen')->dropDownList(['0' => 'No', '1' => 'Yes']) ?>
        </div>
        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'availability')->dropDownList(['1' => 'Available', '0' => 'Not Available']) ?>
        </div>
    </div>
    <div class="row">

        <div class='col-md-4 col-sm-6 col-xs-12 left_padd'>
            <?= $form->field($model, 'image')->fileInput()->label('Product Image<i> (312*210)</i>') ?>
            <?php
            if (!$model->isNewRecord) {
                echo " <h4>product Image</h4>";
                ?>

                <div class = "col-md-2 img-box">
                    <a href="<?= Yii::$app->homeUrl . '../uploads/products/' . $model->id . '/image.' . $model->image ?>" target="_blank">
                        <img src="<?= Yii::$app->homeUrl . '../uploads/products/' . $model->id . '/image.' . $model->image; ?>?<?= rand() ?>" width="60px" height="60px"></a>

                </div>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class='col-md-12 col-sm-12 col-xs-12'>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success', 'style' => 'float:right;']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    $(document).ready(function () {
        $('#products-name').keyup(function () {
            $('#products-canonical_name').val(slug($(this).val()));
        });
        var slug = function (str) {
            var $slug = '';
            var trimmed = $.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                    replace(/-+/g, '-').
                    replace(/^-|-$/g, '');
            return $slug.toLowerCase();
        };
    });
</script>
