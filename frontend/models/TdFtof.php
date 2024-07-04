<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "td_ftof".
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
 * @property int|null $rs2_a
 * @property int|null $rs2_b
 * @property int|null $rs2_c
 * @property int|null $rs3_a
 * @property int|null $rs3_b
 * @property int|null $rs3_c
 * @property int|null $trn_host_a
 * @property int|null $trn_host_b
 * @property int|null $trn_host_c
 * @property int|null $trn_host_d
 * @property int|null $admin_a
 * @property int|null $admin_b
 * @property int|null $admin_c
 * @property int|null $admin_d
 * @property int|null $admin_e
 * @property int|null $osr
 *
 * @property Rating $adminA
 * @property Rating $adminB
 * @property Rating $adminC
 * @property Rating $adminD
 * @property Rating $adminE
 * @property Rating $methA
 * @property Rating $methB
 * @property Rating $methC
 * @property Rating $methD
 * @property Rating $methE
 * @property Rating $ocdA
 * @property Rating $ocdB
 * @property Rating $ocdC
 * @property Rating $ocdD
 * @property Rating $ocdE
 * @property Rating $osr0
 * @property Csf $process
 * @property Rating $rs1A
 * @property Rating $rs1B
 * @property Rating $rs1C
 * @property Rating $rs2A
 * @property Rating $rs2B
 * @property Rating $rs2C
 * @property Rating $rs3A
 * @property Rating $rs3B
 * @property Rating $rs3C
 * @property Rating $trnHostA
 * @property Rating $trnHostB
 * @property Rating $trnHostC
 * @property Rating $trnHostD
 */
class TdFtof extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'td_ftof';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ocd_a', 'ocd_b', 'ocd_c', 'ocd_d', 'ocd_e', 'meth_a', 'meth_b', 'meth_c', 'meth_d', 'meth_e', 'rs1_a', 'rs1_b', 'rs1_c', 'rs2_a', 'rs2_b', 'rs2_c', 'rs3_a', 'rs3_b', 'rs3_c', 'trn_host_a', 'trn_host_b', 'trn_host_c', 'trn_host_d', 'admin_a', 'admin_b', 'admin_c', 'admin_d', 'admin_e', 'osr'], 'integer'],
            [['process_id'], 'string', 'max' => 50],
            [['process_id'], 'exist', 'skipOnError' => true, 'targetClass' => Csf::class, 'targetAttribute' => ['process_id' => 'id']],
            [['meth_d'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['meth_d' => 'id']],
            [['rs1_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs1_a' => 'id']],
            [['rs1_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs1_b' => 'id']],
            [['rs1_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs1_c' => 'id']],
            [['rs2_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs2_a' => 'id']],
            [['rs2_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs2_b' => 'id']],
            [['rs2_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs2_c' => 'id']],
            [['rs3_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs3_a' => 'id']],
            [['rs3_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs3_b' => 'id']],
            [['rs3_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['rs3_c' => 'id']],
            [['ocd_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['ocd_a' => 'id']],
            [['trn_host_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['trn_host_a' => 'id']],
            [['trn_host_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['trn_host_b' => 'id']],
            [['trn_host_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['trn_host_c' => 'id']],
            [['trn_host_d'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['trn_host_d' => 'id']],
            [['admin_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['admin_a' => 'id']],
            [['admin_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['admin_b' => 'id']],
            [['admin_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['admin_c' => 'id']],
            [['admin_d'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['admin_d' => 'id']],
            [['admin_e'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['admin_e' => 'id']],
            [['osr'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['osr' => 'id']],
            [['ocd_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['ocd_b' => 'id']],
            [['ocd_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['ocd_c' => 'id']],
            [['ocd_d'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['ocd_d' => 'id']],
            [['ocd_e'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['ocd_e' => 'id']],
            [['meth_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['meth_a' => 'id']],
            [['meth_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['meth_b' => 'id']],
            [['meth_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['meth_c' => 'id']],
            [['meth_e'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['meth_c' => 'id']],
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
            'rs2_a' => Yii::t('app', 'Rs2 A'),
            'rs2_b' => Yii::t('app', 'Rs2 B'),
            'rs2_c' => Yii::t('app', 'Rs2 C'),
            'rs3_a' => Yii::t('app', 'Rs3 A'),
            'rs3_b' => Yii::t('app', 'Rs3 B'),
            'rs3_c' => Yii::t('app', 'Rs3 C'),
            'trn_host_a' => Yii::t('app', 'Trn Host A'),
            'trn_host_b' => Yii::t('app', 'Trn Host B'),
            'trn_host_c' => Yii::t('app', 'Trn Host C'),
            'trn_host_d' => Yii::t('app', 'Trn Host D'),
            'admin_a' => Yii::t('app', 'Admin A'),
            'admin_b' => Yii::t('app', 'Admin B'),
            'admin_c' => Yii::t('app', 'Admin C'),
            'admin_d' => Yii::t('app', 'Admin D'),
            'admin_e' => Yii::t('app', 'Admin E'),
            'osr' => Yii::t('app', 'Osr'),
        ];
    }

    /**
     * Gets query for [[AdminA]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdminA()
    {
        return $this->hasOne(Rating::class, ['id' => 'admin_a']);
    }

    /**
     * Gets query for [[AdminB]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdminB()
    {
        return $this->hasOne(Rating::class, ['id' => 'admin_b']);
    }

    /**
     * Gets query for [[AdminC]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdminC()
    {
        return $this->hasOne(Rating::class, ['id' => 'admin_c']);
    }

    /**
     * Gets query for [[AdminD]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdminD()
    {
        return $this->hasOne(Rating::class, ['id' => 'admin_d']);
    }

    /**
     * Gets query for [[AdminE]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdminE()
    {
        return $this->hasOne(Rating::class, ['id' => 'admin_e']);
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
     * Gets query for [[MethD]].
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
     * Gets query for [[OcdB]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOcdB()
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
     * Gets query for [[OcdD]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOcdD()
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
}
