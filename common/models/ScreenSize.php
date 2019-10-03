<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "screen_size".
 *
 * @property int $id
 * @property string $name
 * @property string $value
 * @property int $CB
 * @property int $UB
 * @property string $DOC
 * @property string $DOU
 * @property int $status
 */
class ScreenSize extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'screen_size';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['CB', 'UB', 'status'], 'integer'],
                [['DOC', 'DOU'], 'safe'],
                [['name', 'value'], 'string', 'max' => 200],
                [['name', 'value'], 'required'],
                [['name', 'value'], 'unique']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'value' => 'Value',
            'CB' => 'Cb',
            'UB' => 'Ub',
            'DOC' => 'Doc',
            'DOU' => 'Dou',
            'status' => 'Status',
        ];
    }

}
