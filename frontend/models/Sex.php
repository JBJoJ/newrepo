<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "sex".
 *
 * @property int $id
 * @property string $sex
 */
class Sex extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sex';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sex'], 'required'],
            [['sex'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sex' => 'Sex',
        ];
    }

    public static function getSexList()
    {
        $sex = self::find()->all();
        return \yii\helpers\ArrayHelper::map($sex, 'id', 'sex');
    }
}
