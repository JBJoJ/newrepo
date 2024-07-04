<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "recruitment".
 *
 * @property int $id
 * @property string|null $process_id
 * @property int|null $qs_a
 * @property int|null $qs_b
 * @property int|null $qs_c
 * @property int|null $qs_d
 * @property int|null $rsi_a
 * @property int|null $rsi_b
 * @property int|null $rsi_c
 * @property int|null $rsi_d
 * @property int|null $tv_a
 * @property int|null $tv_b
 * @property int|null $tv_c
 * @property int|null $tv_d
 * @property int|null $osr
 *
 * @property Rating $osr0
 * @property Csf $process
 * @property Rating $qsA
 * @property Rating $qsB
 * @property Rating $qsC
 * @property Rating $qsD
 * @property Rating $rsiA
 * @property Rating $rsiB
 * @property Rating $rsiC
 * @property Rating $rsiD
 * @property Rating $tvA
 * @property Rating $tvB
 * @property Rating $tvC
 * @property Rating $tvD
 */
class Recruitment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recruitment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['qs_a', 'qs_b', 'qs_c', 'qs_d', 'rsi_a', 'rsi_b', 'rsi_c', 'rsi_d', 'tv_a', 'tv_b', 'tv_c', 'tv_d', 'osr'], 'integer'],
            [['process_id'], 'string', 'max' => 50],
            [['osr'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['osr' => 'id']],
            [['process_id'], 'exist', 'skipOnError' => true, 'targetClass' => Csf::class, 'targetAttribute' => ['process_id' => 'id']],
            [['qs_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['qs_a' => 'id']],
            [['qs_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['qs_b' => 'id']],
            [['qs_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['qs_c' => 'id']],
            [['qs_d'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['qs_d' => 'id']],
            [['rsi_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rsi_a' => 'id']],
            [['rsi_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rsi_b' => 'id']],
            [['rsi_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rsi_c' => 'id']],
            [['rsi_d'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rsi_d' => 'id']],
            [['tv_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['tv_a' => 'id']],
            [['tv_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['tv_b' => 'id']],
            [['tv_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['tv_c' => 'id']],
            [['tv_d'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['tv_d' => 'id']],
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
            'qs_a' => Yii::t('app', 'Qs A'),
            'qs_b' => Yii::t('app', 'Qs B'),
            'qs_c' => Yii::t('app', 'Qs C'),
            'qs_d' => Yii::t('app', 'Qs D'),
            'rsi_a' => Yii::t('app', 'Rsi A'),
            'rsi_b' => Yii::t('app', 'Rsi B'),
            'rsi_c' => Yii::t('app', 'Rsi C'),
            'rsi_d' => Yii::t('app', 'Rsi D'),
            'tv_a' => Yii::t('app', 'Tv A'),
            'tv_b' => Yii::t('app', 'Tv B'),
            'tv_c' => Yii::t('app', 'Tv C'),
            'tv_d' => Yii::t('app', 'Tv D'),
            'osr' => Yii::t('app', 'Osr'),
        ];
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
     * Gets query for [[QsA]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQsA()
    {
        return $this->hasOne(Rating::class, ['id' => 'qs_a']);
    }

    /**
     * Gets query for [[QsB]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQsB()
    {
        return $this->hasOne(Rating::class, ['id' => 'qs_b']);
    }

    /**
     * Gets query for [[QsC]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQsC()
    {
        return $this->hasOne(Rating::class, ['id' => 'qs_c']);
    }

    /**
     * Gets query for [[QsD]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQsD()
    {
        return $this->hasOne(Rating::class, ['id' => 'qs_d']);
    }

    /**
     * Gets query for [[RsiA]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRsiA()
    {
        return $this->hasOne(Rating::class, ['id' => 'rsi_a']);
    }

    /**
     * Gets query for [[RsiB]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRsiB()
    {
        return $this->hasOne(Rating::class, ['id' => 'rsi_b']);
    }

    /**
     * Gets query for [[RsiC]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRsiC()
    {
        return $this->hasOne(Rating::class, ['id' => 'rsi_c']);
    }

    /**
     * Gets query for [[RsiD]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRsiD()
    {
        return $this->hasOne(Rating::class, ['id' => 'rsi_d']);
    }

    /**
     * Gets query for [[TvA]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTvA()
    {
        return $this->hasOne(Rating::class, ['id' => 'tv_a']);
    }

    /**
     * Gets query for [[TvB]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTvB()
    {
        return $this->hasOne(Rating::class, ['id' => 'tv_b']);
    }

    /**
     * Gets query for [[TvC]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTvC()
    {
        return $this->hasOne(Rating::class, ['id' => 'tv_c']);
    }

    /**
     * Gets query for [[TvD]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTvD()
    {
        return $this->hasOne(Rating::class, ['id' => 'tv_d']);
    }
}
