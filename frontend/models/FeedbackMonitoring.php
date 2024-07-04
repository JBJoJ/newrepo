<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "feedback_monitoring".
 *
 * @property int $id
 * @property string|null $reporting_period
 * @property int|null $office_id
 * @property string|null $process_id
 * @property string $date
 * @property int $source_document
 * @property int $feedback
 * @property string $action_plan
 * @property string $action_taken
 * @property int|null $status
 *
 * @property Office $office
 * @property Csf $process
 * @property FeedbackStatus $status0
 */
class FeedbackMonitoring extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback_monitoring';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reporting_period', 'date'], 'safe'],
            [['office_id', 'source_document', 'feedback', 'status'], 'integer'],
            [['date', 'source_document', 'feedback', 'action_plan', 'action_taken'], 'required'],
            [['action_plan', 'action_taken'], 'string'],
            [['process_id'], 'string', 'max' => 50],
            [['office_id'], 'exist', 'skipOnError' => true, 'targetClass' => Office::class, 'targetAttribute' => ['office_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => FeedbackStatus::class, 'targetAttribute' => ['status' => 'id']],
            [['process_id'], 'exist', 'skipOnError' => true, 'targetClass' => Csf::class, 'targetAttribute' => ['process_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'reporting_period' => Yii::t('app', 'Reporting Period'),
            'office_id' => Yii::t('app', 'Office ID'),
            'process_id' => Yii::t('app', 'Process ID'),
            'date' => Yii::t('app', 'Date'),
            'source_document' => Yii::t('app', 'Source Document'),
            'feedback' => Yii::t('app', 'Feedback'),
            'action_plan' => Yii::t('app', 'Action Plan'),
            'action_taken' => Yii::t('app', 'Action Taken'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * Gets query for [[Office]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOffice()
    {
        return $this->hasOne(Office::class, ['id' => 'office_id']);
    }

    /**
     * Gets query for [[Process]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProcess()
    {
        return $this->hasOne(Csf::class, ['id' => 'process_id']);
    }

    /**
     * Gets query for [[Status0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(FeedbackStatus::class, ['id' => 'status']);
    }
}
