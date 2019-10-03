<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\Products;
use common\models\ProductsSearch;
use common\models\ScreenSize;
use yii\helpers\Html;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
//            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex($keyword = NULL, $minrange = NULL, $maxrange = NULL, $brand = NULL, $processor = NULL, $touch = NULL, $availability = NULL, $screen = NULL) {

        $price_condition = !empty($minrange) ? Products::price_filter($minrange, $maxrange) : '';
        $brand_condition = !empty($brand) ? Products::brand_filter($brand) : '';
        $processor_condition = !empty($processor) ? Products::processor_filter($processor) : '';
        $touch_condition = !empty($touch) ? Products::touch_filter($touch) : '';
        $screen_condition = !empty($screen) ? Products::screen_filter($screen) : '';
        $keyword_condition = !empty($keyword) ? Products::keyword_filter($keyword) : '';

        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if (empty($availability)) {
            $dataProvider->query->andWhere(['availability' => 1]);
        }
        $dataProvider->query->andWhere($price_condition);
        $dataProvider->query->andWhere($brand_condition);
        $dataProvider->query->andWhere($processor_condition);
        $dataProvider->query->andWhere($touch_condition);
        $dataProvider->query->andWhere($screen_condition);
        $dataProvider->query->andWhere($keyword_condition);

        $pricerange = \common\models\PriceRange::find()->where(['status' => 1])->all();
        $brands = \common\models\Brands::find()->where(['status' => 1])->all();
        $processors = \common\models\ProcessorType::find()->where(['status' => 1])->all();
        $screen_size = \common\models\ScreenSize::find()->where(['status' => 1])->all();

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'brands' => $brands,
                    'processors' => $processors,
                    'pricerange' => $pricerange,
                    'screen_size' => $screen_size
        ]);
    }

    public function actionSearchProduct() {
        if (Yii::$app->request->isAjax) {
            $val = $_POST['val'];
            if (!empty($val)) {
                $products = Products::find()->andWhere(['like', 'name', $val])->all();
                $val = '<ul class="search-dropdown">';
                if ($products) {
                    for ($i = 0; $i < sizeof($products); $i++) {
                        $val .= "<li id='" . $products[$i]->name . "'>" . $products[$i]->name . " </li>";
                    }
                    $val .= '</ul>';
                    echo json_encode(array('msg' => 'success', 'val' => $val));
                    exit;
                } else {
                    echo json_encode(array('msg' => 'failed', 'error' => ''));
                    exit;
                }
            }
        }
    }

}
