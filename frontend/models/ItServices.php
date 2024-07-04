<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "it_services".
 *
 * @property int $id
 * @property string|null $process_id
 * @property int|null $rai
 * @property int|null $ro
 * @property int|null $af
 * @property int|null $com
 * @property int|null $osr
 *
 * @property Rating $af0
 * @property Rating $com0
 * @property Rating $osr0
 * @property Csf $process
 * @property Rating $rai0
 * @property Rating $ro0
 */
class ItServices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'it_services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rai', 'ro', 'af', 'com', 'osr'], 'integer'],
            [['process_id'], 'string', 'max' => 50],
            [['af'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['af' => 'id']],
            [['com'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['com' => 'id']],
            [['osr'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['osr' => 'id']],
            [['process_id'], 'exist', 'skipOnError' => true, 'targetClass' => Csf::class, 'targetAttribute' => ['process_id' => 'id']],
            [['rai'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rai' => 'id']],
            [['ro'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['ro' => 'id']],
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
            'rai' => Yii::t('app', 'Rai'),
            'ro' => Yii::t('app', 'Ro'),
            'af' => Yii::t('app', 'Af'),
            'com' => Yii::t('app', 'Com'),
            'osr' => Yii::t('app', 'Osr'),
        ];
    }

    /**
     * Gets query for [[Af0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAf0()
    {
        return $this->hasOne(Rating::class, ['id' => 'af']);
    }

    /**
     * Gets query for [[Com0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCom0()
    {
        return $this->hasOne(Rating::class, ['id' => 'com']);
    }

    /**
     * Gets query for [[Osr0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOsr0()
    {
        return $this->hasOne(Rating::class, ['id' => 'osr']);
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
     * Gets query for [[Rai0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRai0()
    {
        return $this->hasOne(Rating::class, ['id' => 'rai']);
    }

    /**
     * Gets query for [[Ro0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRo0()
    {
        return $this->hasOne(Rating::class, ['id' => 'ro']);
    }
}
