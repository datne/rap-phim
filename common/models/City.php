<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;
use common\models\interfaces\BaseInterface;
use yii\redis\Cache;
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
class City extends ActiveRecord implements BaseInterface
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

    public function getAll()
    {
        $citiesCache = json_decode(Yii::$app->redis->hget('TestCache','cities'));
        if (is_null($citiesCache) || (!is_null($citiesCache) && intval(((time() - $citiesCache->time)/60)) > 30)) {
            $cities = City::find()->where(['isDeleted' => false])->all();
            $data = [];
            foreach ($cities as $key => $value) {
                $city = new \stdClass();
                $city = $value->attributes;
                array_push($data,$city);
            }
            $data['time'] = time();
            Yii::$app->redis->hset('TestCache','cities',json_encode($data));
            unset($data['time']);
            echo 'database';
            return json_decode(json_encode($data), True);
        }
        else {           
            //gmt +7
            // $timezone = +7;
            // $time = gmdate('d-m-Y H:i:s',$citiesCache->time + 3600*($timezone));       
            echo 'cache';
            unset($citiesCache->time);   
            return json_decode(json_encode($citiesCache), True);
        }
    }

    public function getObject($id)
    {
       // throw new \Exception('Method getObject() is not implemented.');
    }

    public function addObject($params)
    {
       // throw new \Exception('Method addObject() is not implemented.');
    }

    public function deleteObject($id)
    {
        //throw new \Exception('Method deleteObject() is not implemented.');
    }

    public function updateObject($id,$params)
    {
        //throw new \Exception('Method updateObject() is not implemented.');
    }
}
