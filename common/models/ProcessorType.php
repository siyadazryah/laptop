<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "processor_type".
 *
 * @property int $id
 * @property string $name
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class ProcessorType extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'processor_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['name'], 'required'],
                [['name'], 'unique'],
                [['CB', 'UB', 'status'], 'integer'],
                [['DOC', 'DOU'], 'safe'],
                [['name'], 'string', 'max' => 200],
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
        return $this->hasMany(Products::className(), ['processor_type' => 'id']);
    }

}
