<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $rol
 * @property Tiempo[] $tiempos 
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $authKey;
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
            ['rol', 'integer'],
            [['username', 'password'], 'required'],
            [['username', 'password'], 'string', 'max' => 25],
        ];
    }

    /**
     * Creo unas constantes, las cuales identificarán el rol.
     */
    const ROL_USUARIO = 0;
    const ROL_ADMINISTRADOR = 1;

    static $rolUser = [
        self::ROL_USUARIO => 'Usuario',
        self::ROL_ADMINISTRADOR => 'Administrador',
    ];

    public function getRolToString() {
        return self::$rolUser[$this->rol];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Usuario',
            'password' => 'Contraseña',
            'rol' => 'Rol',
        ];
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }

    public static function findByUsername($username)
    {
        $users = self::find()->all();
        foreach ($users as $user) {
            if (strcasecmp($user->username, $username) === 0) {
                return new static($user);
            }
        }

        
        return null;
    }
        
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

     public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }
}