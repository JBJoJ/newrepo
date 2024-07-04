<?php

namespace frontend\models;

use Yii;
use yii\base\ModelEvent;

/**
 * This is the model class for table "csf".
 *
 * @property string $id
 * @property string $reporting_period
 * @property int|null $office
 * @property int|null $process
 * @property string $date
 * @property string $client_name
 * @property string $program
 * @property string $duration
 * @property string $platform
 * @property int|null $sex
 * @property int|null $age_distribution
 * @property int $age
 * @property string $region
 * @property string $contact_number
 * @property string $email
 * @property string $business_name
 * @property string $business_address
 * @property int|null $transaction_type
 * @property int|null $disbursement_type
 *
 * @property AgeDistribution $ageDistribution
 * @property Disbursement $disbursementType
 * @property Office $office0
 * @property Processes $process0
 * @property Sex $sex0
 * @property Transaction $transactionType
 */
class Csf extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'csf';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['process', 'office', 'reporting_period', 'date', 'program', 'duration', 'platform', 'sex', 'age_distribution', 'age', 
            // 'region', 'business_name', 'business_address', 'transaction_type', 'disbursement_type','client_name', 'contact_number', 'email'], 'required'],
            [['reporting_period', 'date'], 'safe'],
            [['office', 'process', 'sex', 'age_distribution', 'age', 'transaction_type', 'disbursement_type'], 'integer'],
            [['id', 'client_name', 'duration', 'email'], 'string', 'max' => 50],
            [['program'], 'string', 'max' => 200],
            [['platform', 'region', 'business_name', 'business_address'], 'string', 'max' => 100],
            [['contact_number'], 'string', 'max' => 20],
            [['id'], 'unique'],
            [['age_distribution'], 'exist', 'skipOnError' => true, 'targetClass' => AgeDistribution::class, 'targetAttribute' => ['age_distribution' => 'id']],
            [['disbursement_type'], 'exist', 'skipOnError' => true, 'targetClass' => Disbursement::class, 'targetAttribute' => ['disbursement_type' => 'id']],
            [['office'], 'exist', 'skipOnError' => true, 'targetClass' => Office::class, 'targetAttribute' => ['office' => 'id']],
            [['sex'], 'exist', 'skipOnError' => true, 'targetClass' => Sex::class, 'targetAttribute' => ['sex' => 'id']],
            [['process'], 'exist', 'skipOnError' => true, 'targetClass' => Processes::class, 'targetAttribute' => ['process' => 'id']],
            [['transaction_type'], 'exist', 'skipOnError' => true, 'targetClass' => Transaction::class, 'targetAttribute' => ['transaction_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'reporting_period' => Yii::t('app', 'Reporting Period'),
            'office' => Yii::t('app', 'Office'),
            'process' => Yii::t('app', 'Process'),
            'date' => Yii::t('app', 'Date'),
            'client_name' => Yii::t('app', 'Client Name'),
            'program' => Yii::t('app', 'Program'),
            'duration' => Yii::t('app', 'Duration'),
            'platform' => Yii::t('app', 'Platform'),
            'sex' => Yii::t('app', 'Sex'),
            'age_distribution' => Yii::t('app', 'Age Distribution'),
            'age' => Yii::t('app', 'Age'),
            'region' => Yii::t('app', 'Region'),
            'contact_number' => Yii::t('app', 'Contact Number'),
            'email' => Yii::t('app', 'Email'),
            'business_name' => Yii::t('app', 'Business Name'),
            'business_address' => Yii::t('app', 'Business Address'),
            'transaction_type' => Yii::t('app', 'Transaction Type'),
            'disbursement_type' => Yii::t('app', 'Disbursement Type'),
        ];
    }

    /**
     * Gets query for [[AgeDistribution]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAgeDistribution()
    {
        return $this->hasOne(AgeDistribution::class, ['id' => 'age_distribution']);
    }

    /**
     * Gets query for [[DisbursementType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDisbursementType()
    {
        return $this->hasOne(Disbursement::class, ['id' => 'disbursement_type']);
    }

    /**
     * Gets query for [[Office0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOffice()
    {
        return $this->hasOne(Office::class, ['id' => 'office']);
    }

    /**
     * Gets query for [[Process0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProcess()
    {
        return $this->hasOne(Processes::class, ['id' => 'process']);
    }

    /**
     * Gets query for [[Sex0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSex()
    {
        return $this->hasOne(Sex::class, ['id' => 'sex']);
    }

    /**
     * Gets query for [[TransactionType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTransactionType()
    {
        return $this->hasOne(Transaction::class, ['id' => 'transaction_type']);
    }

    public function init()
    {
        parent::init();

        // Attach the beforeSave event handler
        $this->on(static::EVENT_BEFORE_INSERT, [$this, 'setLastDayOfMonth']);
        $this->on(static::EVENT_BEFORE_UPDATE, [$this, 'setLastDayOfMonth']);
    }

    // Event handler to set the reporting_period to the last day of the selected month
    public function setLastDayOfMonth(ModelEvent $event)
    {
        // Ensure reporting_period is set and is in a valid format (e.g., 'YYYY-MM')
        if ($this->reporting_period && preg_match('/^\d{4}-\d{2}$/', $this->reporting_period)) {
            // Set reporting_period to the last day of the selected month
            $this->reporting_period = date('Y-m-t', strtotime($this->reporting_period . '-01'));
        } else {
            // If reporting_period is not valid, set it to null or handle it accordingly
            $this->reporting_period = null;
        }
    }
}
