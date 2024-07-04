<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property int $id
 * @property string $adjectival_rating
 * @property int $numeric_score
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['adjectival_rating', 'numeric_score'], 'required'],
            [['numeric_score'], 'integer'],
            [['adjectival_rating'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'adjectival_rating' => Yii::t('app', 'Adjectival Rating'),
            'numeric_score' => Yii::t('app', 'Numeric Score'),
        ];
    }

    public static function getRatingradio()
    {
        $rating = self::find()
            ->select(['id', 'numeric_score'])
            ->where(['id' => [1,2,3,4,5,6]])
            ->asArray()
            ->all();

        $ratinglist = [];
        foreach ($rating as $ratings)
        {
            $ratinglist[$ratings['id']] = $ratings['numeric_score'];
        }
        // return \yii\helpers\ArrayHelper::map($rating, 'id', 'numeric_score');
        return $ratinglist;
    }
}
