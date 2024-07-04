<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "type_process".
 *
 * @property int $id
 * @property string $type_process
 *
 * @property Processes[] $processes
 */
class TypeProcess extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type_process';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_process'], 'required'],
            [['type_process'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type_process' => Yii::t('app', 'Type Process'),
        ];
    }

    /**
     * Gets query for [[Processes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProcesses()
    {
        return $this->hasMany(Processes::class, ['process_id' => 'id']);
    }

    public static function getProcessList()
    {
        $process = self::find()->all();
        return \yii\helpers\ArrayHelper::map($process, 'id', 'type_process');
    }
}
