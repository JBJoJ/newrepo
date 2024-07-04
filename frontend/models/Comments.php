<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string|null $process_id
 * @property string $reason
 * @property string $comments
 *
 * @property Csf $process
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reason', 'comments'], 'required'],
            [['reason', 'comments'], 'string'],
            [['process_id'], 'string', 'max' => 50],
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
            'process_id' => Yii::t('app', 'Process ID'),
            'reason' => Yii::t('app', 'Reason'),
            'comments' => Yii::t('app', 'Comments'),
        ];
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
}
