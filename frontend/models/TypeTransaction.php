<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "type_transaction".
 *
 * @property int $id
 * @property string $type_transaction
 *
 * @property Processes[] $processes
 */
class TypeTransaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_transaction'], 'required'],
            [['type_transaction'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type_transaction' => Yii::t('app', 'Type Transaction'),
        ];
    }

    /**
     * Gets query for [[Processes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProcesses()
    {
        return $this->hasMany(Processes::class, ['transaction_id' => 'id']);
    }

    public static function getTransactionList()
    {
        $transaction = self::find()->all();
        return \yii\helpers\ArrayHelper::map($transaction, 'id', 'type_transaction');
    }
}
