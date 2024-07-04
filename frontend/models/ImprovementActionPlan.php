<?php

namespace frontend\models;

use Yii;
use yii\base\ModelEvent;

/**
 * This is the model class for table "improvement_action_plan".
 *
 * @property int $id
 * @property string $reporting_period
 * @property int|null $office
 * @property int|null $process
 * @property string $source_improvement
 * @property string $improvement
 * @property string $responsibility
 * @property string $timeline
 *
 * @property Office $office0
 * @property Processes $process0
 */
class ImprovementActionPlan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'improvement_action_plan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reporting_period'], 'required'],
            [['reporting_period'], 'safe'],
            [['office', 'process'], 'integer'],
            [['source_improvement', 'improvement', 'responsibility', 'timeline'], 'string'],
            [['office'], 'exist', 'skipOnError' => true, 'targetClass' => Office::class, 'targetAttribute' => ['office' => 'id']],
            [['process'], 'exist', 'skipOnError' => true, 'targetClass' => Processes::class, 'targetAttribute' => ['process' => 'id']],
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
            'source_improvement' => Yii::t('app', 'Source Improvement'),
            'improvement' => Yii::t('app', 'Improvement'),
            'responsibility' => Yii::t('app', 'Responsibility'),
            'timeline' => Yii::t('app', 'Timeline'),
        ];
    }

    /**
     * Gets query for [[Office0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOffice0()
    {
        return $this->hasOne(Office::class, ['id' => 'office']);
    }

    /**
     * Gets query for [[Process0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProcess0()
    {
        return $this->hasOne(Processes::class, ['id' => 'process']);
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
