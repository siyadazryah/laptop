<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
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
//            'canonical_name',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'value' => function ($data) {
                    if (!empty($data->image))
                        $img = '<img width="100px" src="' . Yii::$app->homeUrl . '../uploads/products/' . $data->id . '/image.' . $data->image . '?' . rand() . '"/>';
                    return $img;
                },
            ],
            'price',
                [
                'attribute' => 'brand',
                'value' => 'brand0.name'
            ],
                [
                'attribute' => 'processor_type',
                'value' => 'processorType.name'
            ],
//            'screen',
//            'touch_screen',
            [
                'attribute' => 'availability',
                'filter' => ['1' => 'Available', '0' => 'Not Available'],
                'value' => function($data) {
                    return $data->availability == 1 ? 'Available' : 'Not Available';
                }
            ],
            //'CB',
            //'UB',
            //'DOC',
            //'DOU',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update},{delete}'],
        ],
    ]);
    ?>


</div>
