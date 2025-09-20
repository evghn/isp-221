<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $full_name
 * @property string $phone
 * @property string $email
 * @property int $role
 *
 * @property Application[] $applications
 */
class User extends ActiveRecord implements IdentityInterface
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role'], 'default', 'value' => 0],
            [['login', 'password', 'full_name', 'phone', 'email'], 'required'],
            [['role'], 'integer'],
            [['login', 'password', 'full_name', 'phone', 'email'], 'string', 'max' => 255],
            [['login'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'login' => 'Логин',
            'password' => 'Пароль',
            'full_name' => 'ФИО',
            'phone' => 'Телефон',
            'email' => 'Email',
            'role' => 'Role',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['user_id' => 'id']);
    }


    public static function findByUsername($login)
    {
        /*
            подключиться к бд
            выбрать из таблицы пользователей запись 
            со значением login === $login (введенным пользователем на форме)
            если пользователь есть вернуть объект пользователя либо false 
            select *
            from user
            where
                login = $login
            limit 1  
            
            
            // возвращает покупателя с идентификатором 123
            // SELECT * FROM `customer` WHERE `id` = 123
            $customer = Customer::findOne(123);

            // возвращает активного покупателя с идентификатором 123
            // SELECT * FROM `customer` WHERE `id` = 123 AND `status` = 1
            $customer = Customer::findOne([
                'id' => 123,
                'status' => Customer::STATUS_ACTIVE,
            ]);
        */
        $user = static::findOne(['login' => $login]);

        return $user ?? false;
    }


    public function validatePassword($password)
    {
        // проверка паролей из формы с бд
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}
