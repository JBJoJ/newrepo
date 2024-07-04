<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "td_online".
 *
 * @property int $id
 * @property string|null $process_id
 * @property int|null $ocd_a
 * @property int|null $ocd_b
 * @property int|null $ocd_c
 * @property int|null $ocd_d
 * @property int|null $ocd_e
 * @property int|null $meth_a
 * @property int|null $meth_b
 * @property int|null $meth_c
 * @property int|null $meth_d
 * @property int|null $meth_e
 * @property int|null $rs1_a
 * @property int|null $rs1_b
 * @property int|null $rs1_c
 * @property int|null $rs1_d
 * @property int|null $rs2_a
 * @property int|null $rs2_b
 * @property int|null $rs2_c
 * @property int|null $rs2_d
 * @property int|null $rs3_a
 * @property int|null $rs3_b
 * @property int|null $rs3_c
 * @property int|null $rs3_d
 * @property int|null $trn_host_a
 * @property int|null $trn_host_b
 * @property int|null $trn_host_c
 * @property int|null $trn_host_d
 * @property int|null $vp_a
 * @property int|null $vp_b
 * @property int|null $vp_c
 * @property int|null $osr
 *
 * @property Rating $methA
 * @property Rating $methB
 * @property Rating $methC
 * @property Rating $methD
 * @property Rating $methE
 * @property Rating $ocdA
 * @property Rating $ocdA0
 * @property Rating $ocdB
 * @property Rating $ocdB0
 * @property Rating $ocdC
 * @property Rating $ocdC0
 * @property Rating $ocdD
 * @property Rating $ocdD0
 * @property Rating $ocdE
 * @property Rating $osr0
 * @property Csf $process
 * @property Rating $rs1A
 * @property Rating $rs1B
 * @property Rating $rs1C
 * @property Rating $rs1D
 * @property Rating $rs2A
 * @property Rating $rs2B
 * @property Rating $rs2C
 * @property Rating $rs2D
 * @property Rating $rs3A
 * @property Rating $rs3B
 * @property Rating $rs3C
 * @property Rating $rs3D
 * @property Rating $trnHostA
 * @property Rating $trnHostB
 * @property Rating $trnHostC
 * @property Rating $trnHostD
 * @property Rating $vpA
 * @property Rating $vpB
 * @property Rating $vpC
 */
class TdOnline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'td_online';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ocd_a', 'ocd_b', 'ocd_c', 'ocd_d', 'ocd_e', 'meth_a', 'meth_b', 'meth_c', 'meth_d', 'meth_e', 'rs1_a', 'rs1_b', 'rs1_c', 'rs1_d', 'rs2_a', 'rs2_b', 'rs2_c', 'rs2_d', 'rs3_a', 'rs3_b', 'rs3_c', 'rs3_d', 'trn_host_a', 'trn_host_b', 'trn_host_c', 'trn_host_d', 'vp_a', 'vp_b', 'vp_c', 'osr'], 'integer'],
            [['process_id'], 'string', 'max' => 50],
            [['process_id'], 'exist', 'skipOnError' => true, 'targetClass' => Csf::class, 'targetAttribute' => ['process_id' => 'id']],
            [['ocd_e'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['ocd_e' => 'id']],
            [['meth_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['meth_a' => 'id']],
            [['meth_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['meth_b' => 'id']],
            [['meth_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['meth_c' => 'id']],
            [['meth_d'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['meth_d' => 'id']],
            [['meth_e'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['meth_e' => 'id']],
            [['rs1_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs1_a' => 'id']],
            [['rs1_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs1_b' => 'id']],
            [['rs1_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs1_c' => 'id']],
            [['rs1_d'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs1_d' => 'id']],
            [['ocd_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['ocd_a' => 'id']],
            [['rs2_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs2_a' => 'id']],
            [['rs2_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs2_b' => 'id']],
            [['rs2_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs2_c' => 'id']],
            [['rs2_d'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs2_d' => 'id']],
            [['rs3_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs3_a' => 'id']],
            [['rs3_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs3_b' => 'id']],
            [['rs3_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs3_c' => 'id']],
            [['rs3_d'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs3_d' => 'id']],
            [['trn_host_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['trn_host_a' => 'id']],
            [['trn_host_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['trn_host_b' => 'id']],
            [['ocd_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['ocd_b' => 'id']],
            [['trn_host_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['trn_host_c' => 'id']],
            [['trn_host_d'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['trn_host_d' => 'id']],
            [['vp_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['vp_a' => 'id']],
            [['vp_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['vp_b' => 'id']],
            [['vp_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['vp_c' => 'id']],
            [['osr'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['osr' => 'id']],
            [['ocd_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['ocd_c' => 'id']],
            [['ocd_d'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['ocd_d' => 'id']],
            [['ocd_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['ocd_a' => 'id']],
            [['ocd_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['ocd_b' => 'id']],
            [['ocd_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['ocd_c' => 'id']],
            [['ocd_d'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['ocd_d' => 'id']],
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
            'ocd_a' => Yii::t('app', 'Ocd A'),
            'ocd_b' => Yii::t('app', 'Ocd B'),
            'ocd_c' => Yii::t('app', 'Ocd C'),
            'ocd_d' => Yii::t('app', 'Ocd D'),
            'ocd_e' => Yii::t('app', 'Ocd E'),
            'meth_a' => Yii::t('app', 'Meth A'),
            'meth_b' => Yii::t('app', 'Meth B'),
            'meth_c' => Yii::t('app', 'Meth C'),
            'meth_d' => Yii::t('app', 'Meth D'),
            'meth_e' => Yii::t('app', 'Meth E'),
            'rs1_a' => Yii::t('app', 'Rs1 A'),
            'rs1_b' => Yii::t('app', 'Rs1 B'),
            'rs1_c' => Yii::t('app', 'Rs1 C'),
            'rs1_d' => Yii::t('app', 'Rs1 D'),
            'rs2_a' => Yii::t('app', 'Rs2 A'),
            'rs2_b' => Yii::t('app', 'Rs2 B'),
            'rs2_c' => Yii::t('app', 'Rs2 C'),
            'rs2_d' => Yii::t('app', 'Rs2 D'),
            'rs3_a' => Yii::t('app', 'Rs3 A'),
            'rs3_b' => Yii::t('app', 'Rs3 B'),
            'rs3_c' => Yii::t('app', 'Rs3 C'),
            'rs3_d' => Yii::t('app', 'Rs3 D'),
            'trn_host_a' => Yii::t('app', 'Trn Host A'),
            'trn_host_b' => Yii::t('app', 'Trn Host B'),
            'trn_host_c' => Yii::t('app', 'Trn Host C'),
            'trn_host_d' => Yii::t('app', 'Trn Host D'),
            'vp_a' => Yii::t('app', 'Vp A'),
            'vp_b' => Yii::t('app', 'Vp B'),
            'vp_c' => Yii::t('app', 'Vp C'),
            'osr' => Yii::t('app', 'Osr'),
        ];
    }

    /**
     * Gets query for [[MethA]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMethA()
    {
        return $this->hasOne(Rating::class, ['id' => 'meth_a']);
    }

    /**
     * Gets query for [[MethB]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMethB()
    {
        return $this->hasOne(Rating::class, ['id' => 'meth_b']);
    }

    /**
     * Gets query for [[MethC]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMethC()
    {
        return $this->hasOne(Rating::class, ['id' => 'meth_c']);
    }

    /**
     * Gets query for [[MethD]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMethD()
    {
        return $this->hasOne(Rating::class, ['id' => 'meth_d']);
    }

    /**
     * Gets query for [[MethE]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMethE()
    {
        return $this->hasOne(Rating::class, ['id' => 'meth_e']);
    }

    /**
     * Gets query for [[OcdA]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOcdA()
    {
        return $this->hasOne(Rating::class, ['id' => 'ocd_a']);
    }

    /**
     * Gets query for [[OcdA0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOcdA0()
    {
        return $this->hasOne(Rating::class, ['id' => 'ocd_a']);
    }

    /**
     * Gets query for [[OcdB]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOcdB()
    {
        return $this->hasOne(Rating::class, ['id' => 'ocd_b']);
    }

    /**
     * Gets query for [[OcdB0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOcdB0()
    {
        return $this->hasOne(Rating::class, ['id' => 'ocd_b']);
    }

    /**
     * Gets query for [[OcdC]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOcdC()
    {
        return $this->hasOne(Rating::class, ['id' => 'ocd_c']);
    }

    /**
     * Gets query for [[OcdC0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOcdC0()
    {
        return $this->hasOne(Rating::class, ['id' => 'ocd_c']);
    }

    /**
     * Gets query for [[OcdD]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOcdD()
    {
        return $this->hasOne(Rating::class, ['id' => 'ocd_d']);
    }

    /**
     * Gets query for [[OcdD0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOcdD0()
    {
        return $this->hasOne(Rating::class, ['id' => 'ocd_d']);
    }

    /**
     * Gets query for [[OcdE]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOcdE()
    {
        return $this->hasOne(Rating::class, ['id' => 'ocd_e']);
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
     * Gets query for [[Rs1A]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRs1A()
    {
        return $this->hasOne(Rating::class, ['id' => 'rs1_a']);
    }

    /**
     * Gets query for [[Rs1B]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRs1B()
    {
        return $this->hasOne(Rating::class, ['id' => 'rs1_b']);
    }

    /**
     * Gets query for [[Rs1C]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRs1C()
    {
        return $this->hasOne(Rating::class, ['id' => 'rs1_c']);
    }

    /**
     * Gets query for [[Rs1D]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRs1D()
    {
        return $this->hasOne(Rating::class, ['id' => 'rs1_d']);
    }

    /**
     * Gets query for [[Rs2A]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRs2A()
    {
        return $this->hasOne(Rating::class, ['id' => 'rs2_a']);
    }

    /**
     * Gets query for [[Rs2B]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRs2B()
    {
        return $this->hasOne(Rating::class, ['id' => 'rs2_b']);
    }

    /**
     * Gets query for [[Rs2C]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRs2C()
    {
        return $this->hasOne(Rating::class, ['id' => 'rs2_c']);
    }

    /**
     * Gets query for [[Rs2D]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRs2D()
    {
        return $this->hasOne(Rating::class, ['id' => 'rs2_d']);
    }

    /**
     * Gets query for [[Rs3A]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRs3A()
    {
        return $this->hasOne(Rating::class, ['id' => 'rs3_a']);
    }

    /**
     * Gets query for [[Rs3B]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRs3B()
    {
        return $this->hasOne(Rating::class, ['id' => 'rs3_b']);
    }

    /**
     * Gets query for [[Rs3C]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRs3C()
    {
        return $this->hasOne(Rating::class, ['id' => 'rs3_c']);
    }

    /**
     * Gets query for [[Rs3D]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRs3D()
    {
        return $this->hasOne(Rating::class, ['id' => 'rs3_d']);
    }

    /**
     * Gets query for [[TrnHostA]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrnHostA()
    {
        return $this->hasOne(Rating::class, ['id' => 'trn_host_a']);
    }

    /**
     * Gets query for [[TrnHostB]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrnHostB()
    {
        return $this->hasOne(Rating::class, ['id' => 'trn_host_b']);
    }

    /**
     * Gets query for [[TrnHostC]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrnHostC()
    {
        return $this->hasOne(Rating::class, ['id' => 'trn_host_c']);
    }

    /**
     * Gets query for [[TrnHostD]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrnHostD()
    {
        return $this->hasOne(Rating::class, ['id' => 'trn_host_d']);
    }

    /**
     * Gets query for [[VpA]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVpA()
    {
        return $this->hasOne(Rating::class, ['id' => 'vp_a']);
    }

    /**
     * Gets query for [[VpB]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVpB()
    {
        return $this->hasOne(Rating::class, ['id' => 'vp_b']);
    }

    /**
     * Gets query for [[VpC]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVpC()
    {
        return $this->hasOne(Rating::class, ['id' => 'vp_c']);
    }
}
