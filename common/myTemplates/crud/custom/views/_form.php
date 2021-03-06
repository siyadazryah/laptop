<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
        $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form form-inline">

        <?= "<?php " ?>$form = ActiveForm::begin(); ?>

        <?php
        foreach ($generator->getColumnNames() as $attribute) {
                if (in_array($attribute, $safeAttributes)) {
                        echo "<div class='col-md-4 col-sm-6 col-xs-12 left_padd'>";
                        echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
                        echo "</div>";
                }
        }
        ?>

        <div class='col-md-4 col-sm-6 col-xs-12' style="float:right;">
                <div class="form-group" style="float: right;">
                        <?= "<?= " ?>Html::submitButton($model->isNewRecord ? <?= $generator->generateString('Create') ?> : <?= $generator->generateString('Update') ?>, ['class' =>  'btn btn-success', 'style' => 'margin-top: 18px; height: 36px; width:100px;']) ?>
                </div>
        </div>

        <?= "<?php " ?>ActiveForm::end(); ?>

</div>
