<?php

namespace app\models\warehouse;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property integer $user_type
 * @property string $email
 * @property string $sec_question
 * @property string $sec_answer
 *
 * @property UserType $userType
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'accessToken', 'user_type', 'email', 'sec_question', 'sec_answer'], 'required'],
            [['user_type'], 'integer'],
            [['sec_question', 'sec_answer'], 'string'],
            [['username', 'authKey', 'accessToken'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 32],
            [['email'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'user_type' => 'User Type',
            'email' => 'Email',
            'sec_question' => 'Sec Question',
            'sec_answer' => 'Sec Answer',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['id' => 'user_type']);
    }

    public static function findIdentity($id)
    {
        return new static(self::find()->where(['id'=>$id])->one());
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return new static(self::find()->where(['accessToken'=>$token])->one());
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $result = self::find()->where(['username'=>$username])->one();
        return new static($result);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }
}
