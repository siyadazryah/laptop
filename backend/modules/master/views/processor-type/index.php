<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProcessorTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Processor Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="processor-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Processor Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'name',
//            'CB',
//            'UB',
//            'DOC',
            //'DOU',
            [
                'attribute' => 'status',
                'filter' => ['1' => 'Enable', '0' => 'Disable'],
                'value' => function($data) {
                    return $data->status == 1 ? 'Enable' : 'Disable';
                }
            ],
                ['class' => 'yii\grid\ActionColumn',
                'template' => '{update},{delete}'],
        ],
    ]);
    ?>


</div>
