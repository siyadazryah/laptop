<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Update User: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div style="float:right;padding-top: 5px;">

            <?=
            Html::a('<i class="fa fa-pencil-square-o"></i><span> Change password</span>', ['change-password', 'data' => $model->id], ['class' => 'btn btn-blue btn-icon btn-icon-standalone btn-icon-standalone-right']);
            ?>

        </div>
    </div>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
