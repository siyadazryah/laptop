<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "brands".
 *
 * @property int $id
 * @property string $name
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class Brands extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'brands';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['CB', 'UB', 'status'], 'integer'],
                [['DOC', 'DOU'], 'safe'],
                [['name'], 'string', 'max' => 200],
                [['name'], 'required'],
                [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts() {
        return $this->hasMany(Products::className(), ['brand' => 'id']);
    }

}
