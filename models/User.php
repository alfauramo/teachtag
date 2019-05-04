<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use app\models\Center;
use arogachev\ManyToMany\behaviors\ManyToManyBehavior;
use yii\helpers\Html;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $rol
 * @property string $name
 * @property string $email
 * @property string $birthday
 * @property string $centerCode
 * @property string $descripcion
 * @property int Privado

 * @property Center $centro 
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{


    public $editableTags;
    public $likeTags;
    public $friends;
    public $blockeds;
    public $peticiones;
    public function behaviors()
    {

        $behaviors = [
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    [
                        'editableAttribute' => 'editableTags', // Editable attribute name
                        'table' => 'user_has_tag', // Name of the junction table
                        'ownAttribute' => 'user_id', // Name of the column in junction table that represents current model
                        'relatedModel' => Tag::className(), // Related model class
                        'relatedAttribute' => 'tag_id', // Name of the column in junction table that represents related model
                    ],
                ],
            ],
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    [
                        'editableAttribute' => 'likeTags', // Editable attribute name
                        'table' => 'user_like_tag', // Name of the junction table
                        'ownAttribute' => 'user_id', // Name of the column in junction table that represents current model
                        'relatedModel' => Tag::className(), // Related model class
                        'relatedAttribute' => 'tag_id', // Name of the column in junction table that represents related model
                    ],
                ],
            ],
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    [
                        'editableAttribute' => 'friends', // Editable attribute name
                        'table' => 'user_has_friend', // Name of the junction table
                        'ownAttribute' => 'user_id', // Name of the column in junction table that represents current model
                        'relatedModel' => User::className(), // Related model class
                        'relatedAttribute' => 'friend_id', // Name of the column in junction table that represents related model
                    ],
                ],
            ],
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    [
                        'editableAttribute' => 'blockeds', // Editable attribute name
                        'table' => 'user_block_other', // Name of the junction table
                        'ownAttribute' => 'user_id', // Name of the column in junction table that represents current model
                        'relatedModel' => User::className(), // Related model class
                        'relatedAttribute' => 'blocked_id', // Name of the column in junction table that represents related model
                    ],
                ],
            ],
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    [
                        'editableAttribute' => 'peticiones', // Editable attribute name
                        'table' => 'user_has_request', // Name of the junction table
                        'ownAttribute' => 'uid_dest', // Name of the column in junction table that represents current model
                        'relatedModel' => User::className(), // Related model class
                        'relatedAttribute' => 'uid_ori', // Name of the column in junction table that represents related model
                    ],
                ],
            ]
        ];

        return array_merge(parent::behaviors(), $behaviors);
    }
    public static function getDb()
    {
        return Yii::$app->db;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
         return [
             [['username', 'password', 'rol', 'name', 'email', 'birthday'], 'required'],
             [['rol','activate', 'privado'], 'integer'],
             [['birthday'], 'safe'],
             [['descripcion', 'hobbies', 'films', 'music'], 'string'],
             [['username','email'], 'unique'],
             [['username', 'password'], 'string', 'max' => 25],
             [['name'], 'string', 'max' => 75],
             [['username'], 'string', 'skipOnEmpty' => true],
             [['email'], 'string', 'max' => 100],
             [['img_perfil', 'img_cabecera', 'facebook', 'twitter'], 'string', 'max' => 255],
             [['editableTags'], 'safe'],
             [['authKey', 'accessToken'], 'string', 'max' => 250],
             [['centerCode'], 'exist', 'skipOnError' => true, 'targetClass' => Center::className(), 'targetAttribute' => ['centerCode' => 'id']],
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
     * Creo unas constantes, las cuales identificarán el rol.
     */
    const PUBLICO = 0;
    const PRIVADO = 1;

    static $privacidad = [
        self::PUBLICO => 'Público',
        self::PRIVADO => 'Privado',
    ];

    public function getprivadoToString() {
        return self::$privacidad[$this->privado];
    }

    /** 
    * @return \yii\db\ActiveQuery 
    */ 
    public function getCenter() 
    { 
        return $this->hasOne(Center::className(), ['id' => 'centerCode']); 
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->viaTable('user_has_tag', ['user_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFriends()
    {
        return $this->hasMany(User::className(), ['friend_id' => 'id'])
            ->viaTable('user_has_friends', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBloqueados()
    {
        return $this->hasMany(User::className(), ['blocked_id' => 'id'])
            ->viaTable('user_block_other', ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Alias',
            'password' => 'Contraseña',
            'rol' => 'Rol',
            'name' => 'Nombre', 
            'email' => 'Correo electrónico', 
            'birthday' => 'Fecha de nacimiento', 
            'centerCode' => 'Centro', 
            'descripcion' => 'Sobre mí',
            'hobbies' => 'Hobbies',
            'films' => 'Películas y series favoritas',
            'music' => 'Música y artistas preferidos',
            'img_perfil' => 'Foto perfil',
            'img_cabecera' => 'Imagen de cabecera',
            'facebook' => 'Tu cuenta de Facebook',
            'twitter' => 'Tu cuenta de Twitter',
            'editableTags' => 'Tags',
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
        $users = User::find()
                ->where("activate=:activate", ["activate" => 1])
                ->andWhere("username=:username", [":username" => $username])
                ->all();
        
        foreach ($users as $user) {
            if (strcasecmp($user->username, $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }


    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        /* Valida el password */
        if (crypt($password, $this->password) == $this->password){
            return $password === $password;
        }
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
        $users = User::find()
            ->where("activate=:activate", [":activate" => 1])
            ->andWhere("accessToken=:accessToken", [":accessToken" => $token])
            ->all();
        
        foreach ($users as $user) {
            if ($user->accessToken === $token) {
                return new static($user);
            }
        }

        return null;
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $birthday = $this->birthday;
        if(!empty($birthday)){
            $birthday = Yii::$app->formatter->asDate($birthday, 'php:Y-m-d');
            $this->birthday = $birthday;
        }

        return true;
    }

    /**
     * Realiza una query de Center y si el código insertado coincide, se asigna el id al centerCode de usuario
     *
     * @return int $codigo
     */
    public function asignarCentro(){

        $codigo = Center::find()->select('id')
        ->where(['centerCode' => $this->centerCode])
        ->one();
        $codigo = $codigo['id'];

        
        return $codigo;
    }

    /**
     * Método que capta los valores de la tabla usuario.
     * Con afterFind podemos manipular dichos datos antes de ser mostrados en cualquier vista o método.
     */
    public function afterFind(){

        parent::afterFind();

        $birthday = $this->birthday;
        if(!empty($birthday)){
            $birthday = Yii::$app->formatter->asDate($birthday, 'php:d-m-Y');
            $this->birthday = $birthday;
        }
    }

    public function imprimir($id = false, $cant = false){
        if($id == false)
            $id = Yii::$app->user->id;
        $model = User::findOne($id);
        $tags = $model->tags;
        $tags = array_reverse($tags);
        foreach($tags as $t){
            $t->dibujar($id);
        }
    }

    public function mostrarAmigos(){

        foreach($this->friends as $f){
            $f = User::findOne($f);
            $img = $f->img_perfil == null ?  './img/perfil.png' : $f->img_perfil;
            echo "<li>";
            echo Html::a("<img src=$img >", ['user/perfil','id' => $f->id]);
            echo "</li>";
        }
    }

    public function eliminar($id)
    {

        Yii::$app->db->createCommand()
            ->delete('user_has_friend', [
                'user_id' => $this->id,
                'friend_id' => $id,
            ])
            ->execute();

        Yii::$app->db->createCommand()
            ->delete('user_has_friend', [
                'user_id' => $id,
                'friend_id' => $this->id,
            ])
        ->execute();
        return $this->save();
    }

    public function desbloquear($id){
        Yii::$app->db->createCommand()
            ->delete('user_block_other', [
                'user_id' => $this->id,
                'blocked_id' => $id,
            ])
            ->execute();
    }

    public function eliminarPeticion($id){

        Yii::$app->db->createCommand()
            ->delete('user_has_request', [
                'uid_ori' => $this->id,
                'uid_dest' => $id,
            ])
            ->execute();
    }


}