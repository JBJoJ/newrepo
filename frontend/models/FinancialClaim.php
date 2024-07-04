<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "financial_claim".
 *
 * @property int $id
 * @property string|null $process_id
 * @property int|null $raic_a
 * @property int|null $raic_b
 * @property int|null $raic_c
 * @property int|null $raic_d
 * @property int|null $raic_e
 * @property int|null $raic_f
 * @property int|null $af_a
 * @property int|null $af_b
 * @property int|null $af_c
 * @property int|null $rao
 * @property int|null $ovr
 *
 * @property Csf $process
 * @property Csf $process0
 * @property Rating $raicA
 * @property Rating $raicB
 * @property Rating $raicC
 * @property Rating $raicD
 * @property Rating $raicE
 * @property Rating $raicF
 */
class FinancialClaim extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'financial_claim';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['raic_a', 'raic_b', 'raic_c', 'raic_d', 'raic_e', 'raic_f', 'af_a', 'af_b', 'af_c', 'rao', 'ovr'], 'integer'],
            [['process_id'], 'string', 'max' => 50],
            [['process_id'], 'exist', 'skipOnError' => true, 'targetClass' => Csf::class, 'targetAttribute' => ['process_id' => 'id']],
            [['process_id'], 'exist', 'skipOnError' => true, 'targetClass' => Csf::class, 'targetAttribute' => ['process_id' => 'id']],
            [['raic_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['raic_a' => 'id']],
            [['raic_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['raic_b' => 'id']],
            [['raic_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['raic_c' => 'id']],
            [['raic_d'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['raic_d' => 'id']],
            [['raic_e'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['raic_e' => 'id']],
            [['raic_f'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['raic_f' => 'id']],
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
            'raic_a' => Yii::t('app', 'Raic A'),
            'raic_b' => Yii::t('app', 'Raic B'),
            'raic_c' => Yii::t('app', 'Raic C'),
            'raic_d' => Yii::t('app', 'Raic D'),
            'raic_e' => Yii::t('app', 'Raic E'),
            'raic_f' => Yii::t('app', 'Raic F'),
            'af_a' => Yii::t('app', 'Af A'),
            'af_b' => Yii::t('app', 'Af B'),
            'af_c' => Yii::t('app', 'Af C'),
            'rao' => Yii::t('app', 'Rao'),
            'ovr' => Yii::t('app', 'Ovr'),
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

    /**
     * Gets query for [[Process0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProcess0()
    {
        return $this->hasOne(Csf::class, ['id' => 'process_id']);
    }

    /**
     * Gets query for [[RaicA]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRaicA()
    {
        return $this->hasOne(Rating::class, ['id' => 'raic_a']);
    }

    /**
     * Gets query for [[RaicB]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRaicB()
    {
        return $this->hasOne(Rating::class, ['id' => 'raic_b']);
    }

    /**
     * Gets query for [[RaicC]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRaicC()
    {
        return $this->hasOne(Rating::class, ['id' => 'raic_c']);
    }

    /**
     * Gets query for [[RaicD]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRaicD()
    {
        return $this->hasOne(Rating::class, ['id' => 'raic_d']);
    }

    /**
     * Gets query for [[RaicE]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRaicE()
    {
        return $this->hasOne(Rating::class, ['id' => 'raic_e']);
    }

    /**
     * Gets query for [[RaicF]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRaicF()
    {
        return $this->hasOne(Rating::class, ['id' => 'raic_f']);
    }
}
