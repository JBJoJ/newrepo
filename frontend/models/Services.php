<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string|null $process_id
 * @property string $driving
 * @property string $janitorial
 * @property string $equipment
 * @property int|null $raic_a
 * @property int|null $raic_b
 * @property int|null $raic_c
 * @property int|null $raic_d
 * @property int|null $af_a
 * @property int|null $af_b
 * @property int|null $af_c
 * @property int|null $ro_a
 *
 * @property Rating $afA
 * @property Rating $afB
 * @property Rating $afC
 * @property Csf $process
 * @property Rating $raicA
 * @property Rating $raicB
 * @property Rating $raicC
 * @property Rating $raicD
 * @property Rating $roA
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['driving', 'janitorial', 'equipment'], 'required'],
            [['raic_a', 'raic_b', 'raic_c', 'raic_d', 'af_a', 'af_b', 'af_c', 'ro_a'], 'integer'],
            [['process_id', 'driving', 'janitorial', 'equipment'], 'string', 'max' => 50],
            [['raic_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['raic_a' => 'id']],
            [['process_id'], 'exist', 'skipOnError' => true, 'targetClass' => Csf::class, 'targetAttribute' => ['process_id' => 'id']],
            [['raic_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['raic_b' => 'id']],
            [['raic_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['raic_c' => 'id']],
            [['raic_d'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['raic_d' => 'id']],
            [['af_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['af_a' => 'id']],
            [['af_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['af_b' => 'id']],
            [['af_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['af_c' => 'id']],
            [['ro_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['ro_a' => 'id']],
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
            'driving' => Yii::t('app', 'Driving'),
            'janitorial' => Yii::t('app', 'Janitorial'),
            'equipment' => Yii::t('app', 'Equipment'),
            'raic_a' => Yii::t('app', 'Raic A'),
            'raic_b' => Yii::t('app', 'Raic B'),
            'raic_c' => Yii::t('app', 'Raic C'),
            'raic_d' => Yii::t('app', 'Raic D'),
            'af_a' => Yii::t('app', 'Af A'),
            'af_b' => Yii::t('app', 'Af B'),
            'af_c' => Yii::t('app', 'Af C'),
            'ro_a' => Yii::t('app', 'Ro A'),
        ];
    }

    /**
     * Gets query for [[AfA]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAfA()
    {
        return $this->hasOne(Rating::class, ['id' => 'af_a']);
    }

    /**
     * Gets query for [[AfB]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAfB()
    {
        return $this->hasOne(Rating::class, ['id' => 'af_b']);
    }

    /**
     * Gets query for [[AfC]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAfC()
    {
        return $this->hasOne(Rating::class, ['id' => 'af_c']);
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
     * Gets query for [[RoA]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoA()
    {
        return $this->hasOne(Rating::class, ['id' => 'ro_a']);
    }
}
