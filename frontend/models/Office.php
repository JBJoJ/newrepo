<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "office".
 *
 * @property int $id
 * @property string $office
 */
class Office extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'office';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['office'], 'required'],
            [['office'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'office' => Yii::t('app', 'Office'),
        ];
    }

    public static function getOfficeList()
    {
        $office = self::find()->all();
        return \yii\helpers\ArrayHelper::map($office, 'id', 'office');
    }
}
