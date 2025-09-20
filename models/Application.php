<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property string $address
 * @property string $phone
 * @property string $date_time_service
 * @property int $type_service_id
 * @property int $type_pay_id
 * @property int $user_id
 * @property int $status_id
 * @property string $craeted_at
 *
 * @property Status $status
 * @property TypePay $typePay
 * @property TypeService $typeService
 * @property User $user
 */
class Application extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['address', 'phone', 'date_time_service', 'type_service_id', 'type_pay_id', 'user_id', 'status_id'], 'required'],
            [['date_time_service', 'craeted_at'], 'safe'],
            [['type_service_id', 'type_pay_id', 'user_id', 'status_id'], 'integer'],
            [['address', 'phone'], 'string', 'max' => 255],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
            [['type_pay_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypePay::class, 'targetAttribute' => ['type_pay_id' => 'id']],
            [['type_service_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeService::class, 'targetAttribute' => ['type_service_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'phone' => 'Phone',
            'date_time_service' => 'Date Time Service',
            'type_service_id' => 'Type Service ID',
            'type_pay_id' => 'Type Pay ID',
            'user_id' => 'User ID',
            'status_id' => 'Status ID',
            'craeted_at' => 'Craeted At',
        ];
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[TypePay]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypePay()
    {
        return $this->hasOne(TypePay::class, ['id' => 'type_pay_id']);
    }

    /**
     * Gets query for [[TypeService]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypeService()
    {
        return $this->hasOne(TypeService::class, ['id' => 'type_service_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

}
