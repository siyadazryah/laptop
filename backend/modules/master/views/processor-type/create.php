<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProcessorType */

$this->title = 'Create Processor Type';
$this->params['breadcrumbs'][] = ['label' => 'Processor Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="processor-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
