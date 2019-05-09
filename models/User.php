<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use app\models\Center;
use app\models\Foto;
use arogachev\ManyToMany\behaviors\ManyToManyBehavior;
use yii\helpers\Html;
use yii\helpers\Url;

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
    public function getFotos() 
    { 
        return $this->hasMany(Foto::className(), ['user_id' => 'id']); 
    }

    public function getAvatarUrl() {
        if (strlen($this->img_perfil) > 0)
            return $this->img_perfil;
        else
            return '/img/perfil.png';
    }

    public function getCabeceraUrl() {
        if (strlen($this->img_cabecera) > 0)
            return $this->img_cabecera;
        else
            return '/theme/img/top-header1.jpg';
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
        if($cant == false)
            $cant = 5;
        $model = User::findOne($id);
        $tags = $model->tags;
        $tags = array_reverse($tags);
        foreach($tags as $t){
            $t->dibujar($id);
        }
    }

    public function dejarCompartir($id){

        Yii::$app->db->createCommand()
            ->delete('user_has_tag', [
                'user_id' => $this->id,
                'tag_id' => $id,
            ])
            ->execute();
    }

    public function dislike($id){

        Yii::$app->db->createCommand()
            ->delete('user_like_tag', [
                'user_id' => $this->id,
                'tag_id' => $id,
            ])
            ->execute();
    }

    public function mostrarAmigos(){

        foreach($this->friends as $f){
            $f = User::findOne($f);
            $img = $f->img_perfil == null ?  '/img/perfil.png' : $f->img_perfil;
            echo "<li>";
            echo Html::a("<img id='listado_amigos' src=$img >", ['user/perfil','id' => $f->id]);
            echo "</li>";
        }
    }

    public function mostrarAmigosPlantilla(){

        foreach($this->friends as $f){
            $f = User::findOne($f);
            if($f->id !== Yii::$app->user->id){
                $f = User::findOne($f);
                $center = Center::findOne($f->centerCode);
                echo "<div class='col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-6'>
                    <div class='ui-block'>
                    <div class='friend-item'>
                        <div class='friend-header-thumb' style='height:150px;'>
                            <img style='height:100%' src='".$f->getCabeceraUrl()."' alt='friend'>
                        </div>
                    
                        <div class='friend-item-content'>
                    
                            <div class='more'>
                                <svg class='olymp-three-dots-icon'><use xlink:href='./theme/svg-icons/sprites/icons.svg#olymp-three-dots-icon'></use></svg>
                                <ul class='more-dropdown'>
                                    <li>". Html::a('Bloquear',['user/bloquear','id' => $f->id])."
                                    </li>
                                </ul>
                            </div>
                            <div class='friend-avatar'>
                                <div class='author-thumb'>
                                    <img id='friends_pro' src='".$f->getAvatarUrl()."' alt='author'>
                                </div>
                                <div class='author-content'>".Html::a($f->name,['user/perfil', 'id' => $f->id],['class' => 'active'])."
                                    <div class='country'>".$center->nombre."</div>
                                </div>
                            </div>
                    
                            <div class='swiper-container' data-slide='fade'>
                                <div class='swiper-wrapper'>
                                    <div class='swiper-slide'>
                                        <div id='fila' class='friend-count row' data-swiper-parallax='-500'>".
                                        Html::a("<div class='h6'>".count($f->friends)."</div>
                                                <div class='title'>Amigos</div>",['user/ver-amigos', 'id' => $f->id], ['id' => 'amistades'])
                                        ."
                                            <a href='#' class='friend-count-item'>
                                                <div class='h6'>200</div>
                                                <div class='title'>Fotos</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div></div></div>";
            }
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

    public function listarPeticiones(){
        $peticiones = $this->peticiones;
        foreach($peticiones as $p){
            $model = User::findOne($p);
            $centro = $model->center;
            $img = $model->img_perfil === null ? '/img/perfil.png' : $model->img_perfil;
            echo "<li>
                <div class='author-thumb'>
                    <img id='img_pet' src='$img' alt='author'>
                </div>
                <div class='notification-event'>".
                Html::a($model->name,['user/perfil','id' => $model->id], ['class' => 'h6 notification-friend']) . "
                <span class='chat-message-item'>Centro: $centro->nombre</span>
                </div>
                <span class='notification-icon'>".
                Html::a("<span class='icon-add without-text'>
                        <svg class='olymp-happy-face-icon'><use xlink:href='/theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon'></use></svg>
                        </span>", ['user/aceptar','id' => $model->id], ['class' => 'accept-request']). Html::a("<span class='icon-minus'>
                            <svg class='olymp-happy-face-icon'><use xlink:href='/theme/svg-icons/sprites/icons.svg#olymp-happy-face-icon'></use></svg>
                        </span>", ['user/rechazar','id' => $model->id], ['class' => 'accept-request request-del' ])."
                </span>
            </li>";
        }
    }

    public function deleteAvatar() {
        if (strlen($this->img_perfil) > 0 && $this->img_perfil !== null)
            @unlink('.' . $this->img_perfil);
        $this->img_perfil = '';
        return $this->save();
    }

    public function deleteCabecera() {
        if (strlen($this->img_perfil) > 0 && $this->img_cabecera !== null)
            @unlink('.' . $this->img_cabecera);
        $this->img_cabecera = '';
        return $this->save();
    }

    public function mostrarFotos() {
        $fotos = $this->fotos;
        $fotos = array_reverse($fotos);
        $max = 0;
        $i = 1;
        if(count($fotos) > 9){
            $max = 9;
        } else {
            $max = count($fotos);
        }
        foreach($fotos as $f){
            echo "<li>
                    <a href='".Url::to($f->getFilePath($this->id))."'>
                        <img id='slider' src=" . $f->getFilePath($this->id) ." alt='photo'>
                    </a>
                </li>";
            $i++;
            if($i > $max)
                break;
        }
    }

    public function imprimirAlbum(){
        $fotos = $this->fotos;
        $fotos = array_reverse($fotos);
        foreach($fotos as $f){
            echo "<div class='photo-item col-4-width'>
                    <img id='galeria' src='" . $f->getFilePath($this->id) . "' alt='photo'>
                </div>";
        }
    }

    public static function buscarRelacion($q = null, $id = null){
        $resultado = [];
        $palabras = [];
        $users = [];
        $out = ['results' => ['id' => '', 'text' => '']];
        $usuario_final = [];
        if ($q === null)
            return $out;

        trim($q);
        if (strpos($q, ' ') !== false) {
            $palabras = explode(" ",$q);
        }else{
            $palabras[] = $q;
        }

        $cont = 0;
        foreach($palabras as $p){
            if((strlen($p) > 2 && $palabras[0] == $p) || (strlen($p) > 0 && $p == $palabras[$cont])){
                $users = User::find()->where(['rol' => 0])
                    ->where(['like', 'username', $p,])
                    ->all();
            }
        }

        foreach ($users as $u) {
            if($u->id !== Yii::$app->user->identity->id){
                $nombre = "<div class='author vcard inline-items more'>
                    <div class='author-thumb'>
                        <img id='ava_per'alt='author' src='" . $u->getAvatarUrl(). "' class='avatar'>
                    </div> ";
                $nombre .= Html::a("<div class='author-title'> @" . $u->username . "</div><span class='author-subtitle'> " . $u->center->nombre . '</span>', ['user/perfil', 'id' => $u->id], ['class' => 'author-name fn']). '</div>';
                $usuario_final[] = [
                    'id' => $u->id,
                    'nombre' => $nombre,
                    //'centro' => $u->center->nombre,
                    //'avatar' => $u->getAvatarUrl(),
                ];
            }
        }
        


        $resultado['results'] = array_unique($usuario_final, SORT_REGULAR);

        return $resultado;
    }
}