<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "generated_id".
 *
 * @property int $id
 * @property string $generated_id
 */
class GeneratedId extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'generated_id';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['generated_id'], 'required'],
            [['generated_id'], 'string', 'max' => 50],
            [['process'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'generated_id' => Yii::t('app', 'Generated ID'),
        ];
    }

}
