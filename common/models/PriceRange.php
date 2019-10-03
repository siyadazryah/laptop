<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "price_range".
 *
 * @property int $id
 * @property string $price
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class PriceRange extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'price_range';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['price'], 'integer'],
                [['price'], 'required'],
                [['price'], 'unique'],
                [['CB', 'UB', 'status'], 'integer'],
                [['DOC', 'DOU'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'price' => 'Price',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
            'status' => 'Status',
        ];
    }

}
