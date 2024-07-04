<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "request_supply".
 *
 * @property int $id
 * @property string|null $process_id
 * @property int|null $qs_a
 * @property int|null $qs_b
 * @property int|null $staff_a
 * @property int|null $staff_b
 * @property int|null $staff_c
 * @property int|null $staff_d
 * @property int|null $staff_e
 * @property int|null $os_a
 * @property int|null $osr
 *
 * @property Rating $osA
 * @property Rating $osr0
 * @property Csf $process
 * @property Csf $process0
 * @property Rating $qsA
 * @property Rating $qsB
 * @property Rating $staffA
 * @property Rating $staffB
 * @property Rating $staffC
 * @property Rating $staffD
 * @property Rating $staffE
 */
class RequestSupply extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request_supply';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['qs_a', 'qs_b', 'staff_a', 'staff_b', 'staff_c', 'staff_d', 'staff_e', 'os_a', 'osr'], 'integer'],
            [['process_id'], 'string', 'max' => 50],
            [['os_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['os_a' => 'id']],
            [['osr'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['osr' => 'id']],
            [['process_id'], 'exist', 'skipOnError' => true, 'targetClass' => Csf::class, 'targetAttribute' => ['process_id' => 'id']],
            [['process_id'], 'exist', 'skipOnError' => true, 'targetClass' => Csf::class, 'targetAttribute' => ['process_id' => 'id']],
            [['qs_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['qs_a' => 'id']],
            [['qs_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['qs_b' => 'id']],
            [['staff_a'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['staff_a' => 'id']],
            [['staff_b'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['staff_b' => 'id']],
            [['staff_c'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['staff_c' => 'id']],
            [['staff_d'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['staff_d' => 'id']],
            [['staff_e'], 'exist', 'skipOnError' => true, 'targetClass' => Rating::class, 'targetAttribute' => ['staff_e' => 'id']],
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
            'staff_a' => Yii::t('app', 'Staff A'),
            'staff_b' => Yii::t('app', 'Staff B'),
            'staff_c' => Yii::t('app', 'Staff C'),
            'staff_d' => Yii::t('app', 'Staff D'),
            'staff_e' => Yii::t('app', 'Staff E'),
            'os_a' => Yii::t('app', 'Os A'),
            'osr' => Yii::t('app', 'Osr'),
        ];
    }

    /**
     * Gets query for [[OsA]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOsA()
    {
        return $this->hasOne(Rating::class, ['id' => 'os_a']);
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
     * Gets query for [[Process0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProcess0()
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
     * Gets query for [[StaffA]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaffA()
    {
        return $this->hasOne(Rating::class, ['id' => 'staff_a']);
    }

    /**
     * Gets query for [[StaffB]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaffB()
    {
        return $this->hasOne(Rating::class, ['id' => 'staff_b']);
    }

    /**
     * Gets query for [[StaffC]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaffC()
    {
        return $this->hasOne(Rating::class, ['id' => 'staff_c']);
    }

    /**
     * Gets query for [[StaffD]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaffD()
    {
        return $this->hasOne(Rating::class, ['id' => 'staff_d']);
    }

    /**
     * Gets query for [[StaffE]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStaffE()
    {
        return $this->hasOne(Rating::class, ['id' => 'staff_e']);
    }
}
