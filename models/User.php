<?php

namespace app\models;

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
            /*[['username', 'password', 'user_type', 'email', 'sec_question', 'sec_answer'], 'required'],
            [['password'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 50]*/
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

    public function findUser(){
        $sql = "select user.username, user.id, user.email, user_type.id as id_user_type, user_type.name as user_type_name from ".$this->tableName().", user_type where user_type.id = user.user_type";
        $model = self::findBySql($sql)->asArray()->all();
        return $model;
    }

    public function saveBySQL($data){
        $this->username = $data['username'];
        $this->password = md5($data['password']);
        $this->email = $data['email'];
        $this->sec_question = $data['sec_question'];
        $this->sec_answer = $data['sec_answer'];
        $this->user_type = $data['user_type'];
        $this->authKey = "";
        $this->accessToken = "";
        $this->save();
    }

    public function showalluser($id){
        $sql = "select id, username, email from user where id != ". $id." order by username asc";
        return self::findBySql($sql)->asArray()->all();
    }
}
