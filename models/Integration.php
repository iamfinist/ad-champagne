<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "integrations".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $endpoint
 * @property int|null $request_type
 * @property string|null $params
 *
 * @property Event[] $events
 */
class Integration extends \yii\db\ActiveRecord
{

    const REQUEST_TYPE_GET = 1;
    const REQUEST_TYPE_POST = 2;

    public static $requestTypesList = [
        self::REQUEST_TYPE_GET => "GET",
        self::REQUEST_TYPE_POST => "POST"
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'integrations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['request_type'], 'integer'],
            [['name', 'endpoint', 'params'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'endpoint' => 'Эндпоинт',
            'request_type' => 'Тип запроса',
            'params' => 'Параметры',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::class, ['integration' => 'id']);
    }

    public function getRequestTypeLabel() {
        return self::$requestTypesList[$this->request_type];
    }
}
