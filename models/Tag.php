<?php

namespace app\models;

use Yii;
use yii\helpers\html;
use arogachev\ManyToMany\behaviors\ManyToManyBehavior;

/**
 * This is the model class for table "tag".
 *
 * @property int $id
 * @property string $texto
 * @property DateTime $fecha
 *
 * @property TagHasUser[] $tagHasUsers
 * @property User[] $users
 */
class Tag extends \yii\db\ActiveRecord
{

    public $editableUsers;
    public function behaviors()
    {

        $behaviors = [
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    [
                        'editableAttribute' => 'editableUsers', // Editable attribute name
                        'table' => 'user_has_tag', // Name of the junction table
                        'ownAttribute' => 'tag_id', // Name of the column in junction table that represents current model
                        'relatedModel' => Tag::className(), // Related model class
                        'relatedAttribute' => 'user_id', // Name of the column in junction table that represents related model
                    ],
                ],
            ],
        ];

        return array_merge(parent::behaviors(), $behaviors);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['texto'], 'string'],
            [['id'], 'unique'],
            [['fecha'], 'required'],
            [['fecha'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'texto' => 'Contenido',
            'fecha' => 'Fecha de publicación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagHasUsers()
    {
        return $this->hasMany(TagHasUser::className(), ['tag_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
    */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_has_tag', ['tag_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TagQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TagQuery(get_called_class());
    }

    public function dibujar($id){

        if($this->creator_id != $id){
            $user_c = User::findOne($id);
        }
        $user = User::findOne($this->creator_id);
        echo "<div class='ui-block'>";

        if(isset($user_c))
            echo "<p class='shared'>Compartido por <b>@".$user_c->username."</b></p>";

        echo            "<!-- Post -->
                    
                    <article class='hentry post'>
                    
                            <div class='post__author author vcard inline-items'>
                                <img src='"; 
                                if($user->img_perfil === null) 
                                    echo './img/perfil.png'; 
                                else 
                                    echo $user->img_perfil; 
                                echo "' alt='author'>
                    
                                <div class='author-date'>
                                    <a class='h6 post__author-name fn' href='02-ProfilePage.html'>";
                                echo "$user->name </a>
                                    <div class='post__date'>
                                        <time class='published' datetime='";
                                        echo $this->fecha;
                                echo "'>
                                            19 hours ago
                                        </time>
                                    </div>
                                </div>
                    
                                <div class='more'>
                                    <svg class='olymp-three-dots-icon'>
                                        <use xlink:href='theme/svg-icons/sprites/icons.svg#olymp-three-dots-icon'></use>
                                    </svg>
                                    <ul class='more-dropdown'>
                                        <li>
                                            <a href='#'>Editar Post</a>
                                        </li>
                                        <li>
                                            <a href='#'>Eliminar Post</a>
                                        </li>
                                    </ul>
                                </div>
                    
                            </div>
                    
                            <p>$this->texto
                            </p>
                    
                            <div class='post-additional-info inline-items'>
                    
                                <a href='#' class='post-add-icon inline-items' >
                                    <svg class='olymp-heart-icon'>
                                        <use xlink:href='theme/svg-icons/sprites/icons.svg#olymp-heart-icon'></use>
                                    </svg>
                                    <span>8</span>
                                </a>
                    
                                <ul class='friends-harmonic'>
                                    <li>
                                        <a href='#'>
                                            <img src='theme/img/friend-harmonic7.jpg' alt='friend'>
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            <img src='theme/img/friend-harmonic8.jpg' alt='friend'>
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            <img src='theme/img/friend-harmonic9.jpg' alt='friend'>
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            <img src='theme/img/friend-harmonic10.jpg' alt='friend'>
                                        </a>
                                    </li>
                                    <li>
                                        <a href='#'>
                                            <img src='theme/img/friend-harmonic11.jpg' alt='friend'>
                                        </a>
                                    </li>
                                </ul>
                    
                                <div class='names-people-likes'>
                                    <a href='#'>Jenny</a>, <a href='#'>Robert</a> and
                                    <br>6 more liked this
                                </div>
                    
                    
                                <div class='comments-shared'>";

                                if(array_search(Yii::$app->user->id, $this->editableUsers)){
                                    echo Html::a("<svg class='olymp-share-icon'>
                                            <use xlink:href='theme/svg-icons/sprites/icons.svg#olymp-share-icon'></use>
                                        </svg>
                                        <span id='compartido'>24</span>",['user/dejar-compartir', 'id' => $this->id], ['class' => 'post-add-icon inline-items', 'id' => 'compartido']);
                                }else{
                    
                                echo "    <a href='#' class='post-add-icon inline-items'>
                                        <svg class='olymp-share-icon'>
                                            <use xlink:href='theme/svg-icons/sprites/icons.svg#olymp-share-icon'></use>
                                        </svg>
                                        <span>24</span>
                                    </a>";
                                }
                                echo "
                                </div>
                    
                    
                            </div>
                    
                            <div class='control-block-button post-control-button'>
                    
                                <a href='#' class='btn btn-control'>
                                    <svg class='olymp-like-post-icon'>
                                        <use xlink:href='theme/svg-icons/sprites/icons.svg#olymp-like-post-icon'></use>
                                    </svg>
                                </a>
                    
                                <a href='#' class='btn btn-control'>
                                    <svg class='olymp-share-icon'>
                                        <use xlink:href='theme/svg-icons/sprites/icons.svg#olymp-share-icon'></use>
                                    </svg>
                                </a>
                    
                            </div>
                    
                        </article>
                    
                    <!-- .. end Post -->                
                </div>";
    }
}
