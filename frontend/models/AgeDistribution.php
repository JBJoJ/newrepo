<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "age_distribution".
 *
 * @property int $id
 * @property string $age_range
 */
class AgeDistribution extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'age_distribution';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['age_range'], 'required'],
            [['age_range'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'age_range' => Yii::t('app', 'Age Range'),
        ];
    }

    public static function getDistributionList()
    {
        $age_distribution = self::find()->all();
        return \yii\helpers\ArrayHelper::map($age_distribution, 'id', 'age_range');
    }
}
