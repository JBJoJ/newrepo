<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "disbursement".
 *
 * @property int $id
 * @property string $disbursement_type
 */
class Disbursement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disbursement';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['disbursement_type'], 'required'],
            [['disbursement_type'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'disbursement_type' => Yii::t('app', 'Disbursement Type'),
        ];
    }

    public static function getDisbursementList()
    {
        $disbursement = self::find()->all();
        return \yii\helpers\ArrayHelper::map($disbursement, 'id', 'disbursement_type');
    }
}
