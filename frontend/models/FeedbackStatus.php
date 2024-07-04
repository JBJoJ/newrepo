<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "feedback_status".
 *
 * @property int $id
 * @property string $feedback_status
 */
class FeedbackStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['feedback_status'], 'required'],
            [['feedback_status'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'feedback_status' => Yii::t('app', 'Feedback Status'),
        ];
    }
}
