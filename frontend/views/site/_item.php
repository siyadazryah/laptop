<?php

use yii\helpers\Html;
?>

<div class="row">
    <div class="col-md-3">
        <div class="products-links">
            <div class="img-box">
                <img src="<?= Yii::$app->homeUrl . 'uploads/products/' . $model->id . '/image.' . $model->image; ?>?<?= rand() ?>" width="150px"  class="img-fluid">

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <h4><?= $model->name ?></h4>
        <p>Brand : <?= \common\models\Brands::findOne($model->brand)->name ?></p>
        <p>Processor Type : <?= \common\models\ProcessorType::findOne($model->processor_type)->name ?></p>
        <p>Touch Screen : <?= $model->touch_screen == 1 ? 'Yes' : 'No' ?></p>
        <p>Screen Size: <?= $model->screen ?></p>
    </div>
    <div class="col-md-3">
        Rs - <b><?= $model->price ?></b>
        <p><?= $model->availability == 1 ? 'Available' : 'Not Available' ?></p>
    </div>
</div>