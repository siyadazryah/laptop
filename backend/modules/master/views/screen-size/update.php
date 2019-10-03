<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ScreenSize */

$this->title = 'Update Screen Size: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Screen Sizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="screen-size-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
