<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ScreenSize */

$this->title = 'Create Screen Size';
$this->params['breadcrumbs'][] = ['label' => 'Screen Sizes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="screen-size-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
