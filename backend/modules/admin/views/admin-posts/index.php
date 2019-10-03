<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AdminPostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admin Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-posts-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Posts', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'post_name',
                [
                'attribute' => 'status',
                'value' => function($model, $key, $index, $column) {
                    return $model->status == 0 ? 'Disabled' : 'Enabled';
                },
                'filter' => [1 => 'Enabled', 0 => 'Disabled'],
            ],
            // 'status',
            // 'CB',
            // 'UB',
            // 'DOC',
            // 'DOU',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}'],
        ],
    ]);
    ?>
</div>


