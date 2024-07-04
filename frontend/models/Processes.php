<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "processes".
 *
 * @property int $id
 * @property string $process
 * @property int|null $process_id
 * @property int|null $transaction_id
 * @property string|null $prefix
 *
 * @property Csf[] $csfs
 * @property TypeProcess $process0
 * @property TypeTransaction $transaction
 */
class Processes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'processes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['process'], 'required'],
            [['process_id', 'transaction_id'], 'integer'],
            [['process', 'prefix'], 'string', 'max' => 50],
            [['process_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeProcess::class, 'targetAttribute' => ['process_id' => 'id']],
            [['transaction_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeTransaction::class, 'targetAttribute' => ['transaction_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'process' => Yii::t('app', 'Process'),
            'process_id' => Yii::t('app', 'Process ID'),
            'transaction_id' => Yii::t('app', 'Transaction ID'),
            'prefix' => Yii::t('app', 'Prefix'),
        ];
    }

    /**
     * Gets query for [[Csfs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCsfs()
    {
        return $this->hasMany(Csf::class, ['process' => 'id']);
    }

    /**
     * Gets query for [[Process0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProcess0()
    {
        return $this->hasOne(TypeProcess::class, ['id' => 'process_id']);
    }

    /**
     * Gets query for [[Transaction]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransaction()
    {
        return $this->hasOne(TypeTransaction::class, ['id' => 'transaction_id']);
    }

    public static function getProcessesList()
    {
        $processes = self::find()->all();
        return \yii\helpers\ArrayHelper::map($processes, 'id', 'process');
    }
}
