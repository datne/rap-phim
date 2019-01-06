<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;
/**
 * This is the model class for table "city".
 *
 * @property int $id
 * @property string $cityname
 * @property int $created_at
 * @property int $updated_at
 * @property int $isDeleted
 * @property int $deletedUserId
 * @property int $deletedTime
 *
 * @property Rap[] $raps
 */
class City extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cityname', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'isDeleted', 'deletedUserId', 'deletedTime'], 'integer'],
            [['cityname'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cityname' => 'Cityname',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'isDeleted' => 'Is Deleted',
            'deletedUserId' => 'Deleted User ID',
            'deletedTime' => 'Deleted Time',
        ];
    }

    public function behaviors()
    {
        return [
            [
            'class' => TimestampBehavior::className(),
             'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                   // ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRaps()
    {
        return $this->hasMany(Rap::className(), ['city_id' => 'id']);
    }
}
