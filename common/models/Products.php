<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property string $canonical_name
 * @property string $image
 * @property string $price
 * @property int $brand
 * @property int $processor_type
 * @property string $screen
 * @property int $touch_screen 1-yes 0- no
 * @property int $availability 1-available 0- not available
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 *
 * @property Brands $brand0
 * @property ProcessorType $processorType
 */
class Products extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['name', 'canonical_name', 'price', 'screen', 'brand', 'processor_type'], 'required'],
                [['screen'], 'number'],
                [['brand', 'processor_type', 'touch_screen', 'availability', 'CB', 'UB'], 'integer'],
                [['DOC', 'DOU'], 'safe'],
                [['name', 'canonical_name'], 'string', 'max' => 250],
                [['canonical_name'], 'unique'],
                [['image'], 'required', 'on' => 'create'],
                [['image'], 'file', 'extensions' => 'png, jpg, jpeg'],
                [['brand'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::className(), 'targetAttribute' => ['brand' => 'id']],
                [['processor_type'], 'exist', 'skipOnError' => true, 'targetClass' => ProcessorType::className(), 'targetAttribute' => ['processor_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'canonical_name' => 'Canonical Name',
            'image' => 'Image',
            'price' => 'Price',
            'brand' => 'Brand',
            'processor_type' => 'Processor Type',
            'screen' => 'Screen Size',
            'touch_screen' => 'Touch Screen',
            'availability' => 'Availability',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand0() {
        return $this->hasOne(Brands::className(), ['id' => 'brand']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcessorType() {
        return $this->hasOne(ProcessorType::className(), ['id' => 'processor_type']);
    }

    /*     * ********filters************ */

    public static function keyword_filter($keyword) {
        $product_id = array();
        $first_product = Products::find()->where(['name' => $keyword])->one();
        $products = Products::find()->where(['brand' => $first_product->brand])->all();
        foreach ($products as $prdct) {
            $product_id[] = $prdct->id;
        }
        $condition = ['in', 'id', $product_id];
        return $condition;
    }

    public static function price_filter($minrange, $maxrange) {
        $min_ = $minrange == "Min" ? 0 : $minrange;
        $max_ = $maxrange == "Max" ? Products::find()->max('price') : $maxrange;
        $condition = ['between', 'price', $min_, $max_];
        return $condition;
    }

    public static function screen_filter($screen) {
        $screen_sizes = explode(',', $screen);
        $product_id = array();
        foreach ($screen_sizes as $screen_size) {
            $screen_values = ScreenSize::find()->where(['name' => $screen_size])->one()->value;
            $product_id = Products::screen_product($screen_values, $product_id);
        }
        $condition = ['in', 'id', $product_id];
        return $condition;
    }

    public static function screen_product($screen_values, $product_id) {
        $sc_values = explode('-', $screen_values);
        $min_ = floatval($sc_values[0]);
        $max_ = $sc_values[1] == "" ? floatval(Products::find()->max('screen')) : floatval($sc_values[1]);
        $conditions = ['between', 'screen', $min_, $max_];
        $products = Products::find()->where($conditions)->all();
        foreach ($products as $prdct) {
            if (!in_array($prdct->id, $product_id)) {
                array_push($product_id, $prdct->id);
            }
        }
        return $product_id;
    }

    public static function brand_filter($brand) {
        $brand_id = array();
        $brands = explode(',', $brand);
        foreach ($brands as $brnd) {
            $brand_ = Brands::find()->where(['name' => $brnd])->one();
            $brand_id[] = $brand_->id;
        }
        $condition = ['in', 'brand', $brand_id];
        return $condition;
    }

    public static function processor_filter($processor) {
        $processor_id = array();
        $processors = explode(',', $processor);
        foreach ($processors as $prcsser) {
            $processor_type = ProcessorType::find()->where(['name' => $prcsser])->one();
            $processor_id[] = $processor_type->id;
        }
        $condition = ['in', 'processor_type', $processor_id];
        return $condition;
    }

    public static function touch_filter($touch) {
        $touch_screen = array();
        $touch_ = explode(',', $touch);
        foreach ($touch_ as $tch) {
            $touch_screen[] = $tch == 'yes' ? '1' : '0';
        }
        $condition = ['in', 'touch_screen', $touch_screen];
        return $condition;
    }

}
