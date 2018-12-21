<?php

namespace common\models;

use Yii;

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
class City extends \yii\db\ActiveRecord
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRaps()
    {
        return $this->hasMany(Rap::className(), ['city_id' => 'id']);
    }
}
