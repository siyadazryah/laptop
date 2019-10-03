<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PriceRange */

$this->title = 'Create Price Range';
$this->params['breadcrumbs'][] = ['label' => 'Price Ranges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-range-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
