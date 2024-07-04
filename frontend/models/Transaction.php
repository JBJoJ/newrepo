<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property int $id
 * @property string $transaction_type
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transaction_type'], 'required'],
            [['transaction_type'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'transaction_type' => Yii::t('app', 'Transaction Type'),
        ];
    }

    public static function getTransactionList()
    {
        $transaction = self::find()->all();
        return \yii\helpers\ArrayHelper::map($transaction, 'id', 'transaction_type');
    }
}
