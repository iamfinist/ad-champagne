<?php

namespace app\models;

use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "events".
 *
 * @property int $id
 * @property int|null $created_at
 * @property string|null $goal
 * @property float|null $price
 * @property int|null $integration_id
 * @property int|null $status
 *
 * @property Integration $integration
 */
class Event extends \yii\db\ActiveRecord
{

    const STATUS_CREATED = 1;
    const STATUS_CONFIRMED = 2;

    public static $statusList = [
        self::STATUS_CREATED => 'Создано',
        self::STATUS_CONFIRMED => 'Подтверждено'
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%events}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'integration_id', 'status'], 'integer'],
            [['price'], 'number'],
            [['goal'], 'string', 'max' => 255],
            [['integration_id'], 'exist', 'skipOnError' => true, 'targetClass' => Integration::class, 'targetAttribute' => ['integration_id' => 'id']],
            [['status'], 'in', 'range' => array_keys(self::$statusList), 'allowArray' => true]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Дата и время',
            'goal' => 'Наименование',
            'price' => 'Стоимость',
            'integration_id' => 'ID поставщика',
            'status' => 'Статус',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => 'status'
                ],
                'value' => function ($event) {
                    return self::STATUS_CREATED;
                }
            ],
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => 'created_at'
                ]
            ]
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIntegration()
    {
        return $this->hasOne(Integration::class, ['id' => 'integration_id']);
    }

    public function getStatusLabel() {
        return self::$statusList[$this->status];
    }
}
