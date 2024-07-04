<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "client_type".
 *
 * @property int $id
 * @property string $client_type
 */
class ClientType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_type'], 'required'],
            [['client_type'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'client_type' => Yii::t('app', 'Client Type'),
        ];
    }
}
