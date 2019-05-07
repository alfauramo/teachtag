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
    public $likeUsers;
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
            [
                'class' => ManyToManyBehavior::className(),
                'relations' => [
                    [
                        'editableAttribute' => 'likeUsers',
                        'table' => 'user_like_tag',
                        'ownAttribute' => 'tag_id', // Name of the column in junction table that represents current model
                        'relatedModel' => Tag::className(), // Related model class
                        'relatedAttribute' => 'user_id', // Name of the column in junction table that represents related model
                    ],
                ],
            ]
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
            [['id', 'pdf'], 'integer'],
            [['texto'], 'string'],
            [['id'], 'unique'],
            [['fecha'], 'required'],
            [['fecha'], 'safe'],
        ];
    }

    /**
     * Creo unas constantes, las cuales identificarán el rol.
     */
    const NO_DESCARGABLE = 0;
    const DESCARGABLE = 1;

    static $pdf = [
        self::DESCARGABLE => 'Descargar como PDF',
        self::NO_DESCARGABLE => 'No descargable',
    ];

    public function getRolToString() {
        return self::$pdf[$this->pdf];
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

    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return true;
        }

        Yii::$app->db->createCommand()
            ->delete('user_has_tag', ['tag_id' => $this->id])
            ->execute();

        Yii::$app->db->createCommand()
            ->delete('user_like_tag', ['tag_id' => $this->id])
            ->execute();
        
        return $this->save();
    }

    public function dibujar($id){

        if($this->creator_id != $id){
            $user_c = User::findOne($id);
        }
        $user = User::findOne($this->creator_id);
        echo "<div class='ui-block'>

        <!-- Post -->
        <article class='hentry post'>
            
            <div class='post__author author vcard inline-items'>
                <img src='"; 
                if($user->img_perfil === null) 
                    echo './img/perfil.png'; 
                else 
                    echo $user->img_perfil; 
                echo "' alt='author'>
    
                <div class='author-date'>";
                echo Html::a($user->name,['user/perfil','id' => $this->creator_id],['class' => 'h6 post__author-name fn']);

                echo "<div class='post__date'>
                        <time class='published' datetime='";
                            echo $this->fecha . "'>
                            19 hours ago
                        </time>
                    </div>
            </div>";

            if(isset($user_c))
                echo "<p class='more'>Compartido por <b>@".$user_c->username."</b></p>";
            if(!isset($user_c) && $this->creator_id == Yii::$app->user->id){
                echo "<div class='more'>
                    <svg class='olymp-three-dots-icon'>
                        <use xlink:href='/theme/svg-icons/sprites/icons.svg#olymp-three-dots-icon'></use>
                    </svg>
                <ul class='more-dropdown'>
                    <li>";
                echo Html::a('Editar',['tag/update', 'id' => $this->id])."
                    </li>
                    <li>";
                echo Html::a('Eliminar',['tag/delete', 'id' => $this->id],['method' => 'post']) ."
                    </li>
                </ul>
            </div>";
            }
            echo "</div>
                <p>$this->texto</p>
            <div class='post-additional-info inline-items'>";
                if(array_search(Yii::$app->user->id, $this->likeUsers) !== false){
                    echo Html::a("<svg class='olymp-heart-icon'>
                        <use xlink:href='/theme/svg-icons/sprites/icons.svg#olymp-heart-icon'></use>
                    </svg>
                    <span id='liked'>".count($this->likeUsers)."</span>",['user/dislike', 'id' => $this->id], ['class' => 'post-add-icon inline-items', 'id' => 'liked']);
                }else{
                    echo Html::a("<svg class='olymp-heart-icon'>
                        <use xlink:href='/theme/svg-icons/sprites/icons.svg#olymp-heart-icon'></use>
                    </svg>
                    <span>".count($this->likeUsers)."</span>",['user/like', 'id' => $this->id], ['class' => 'post-add-icon inline-items']);
                }
                if($this->pdf == Tag::DESCARGABLE){
                    echo Html::a('<i class="fa fa-download"></i> Descargar Tag', ['/tag/descargar','id' => $this->id], [
                        'class'=>'', 
                        'target'=>'_blank', 
                        'data-toggle'=>'tooltip', 
                        'title'=>'Abre el Tag como un PDF en otra pestaña'
                    ]);
                }
                echo "<div class='comments-shared'>";
                if(array_search(Yii::$app->user->id, $this->editableUsers)){
                    echo Html::a("<svg class='olymp-share-icon'>
                        <use xlink:href='/theme/svg-icons/sprites/icons.svg#olymp-share-icon'></use>
                    </svg>
                    <span id='compartido'>".(count($this->editableUsers)-1)."</span>",['user/dejar-compartir', 'id' => $this->id], ['class' => 'post-add-icon inline-items', 'id' => 'compartido']);
                }else{
                    echo Html::a("<svg class='olymp-share-icon'>
                        <use xlink:href='/theme/svg-icons/sprites/icons.svg#olymp-share-icon'></use>
                    </svg>
                    <span>".(count($this->editableUsers)-1)."</span>",['user/compartir', 'id' => $this->id], ['class' => 'post-add-icon inline-items']);
                }
                echo "</div>
            </div>
            <div class='control-block-button post-control-button'>";
            if(array_search(Yii::$app->user->id, $this->likeUsers) !== false){
                echo Html::a("<svg class='olymp-like-post-icon'>
                    <use xlink:href='/theme/svg-icons/sprites/icons.svg#olymp-like-post-icon'></use>
                </svg>",['user/dislike', 'id' => $this->id], ['class' => 'btn btn-control', 'id' => 'liked_but']);
            }else{
                echo Html::a("<svg class='olymp-like-post-icon'>
                    <use xlink:href='/theme/svg-icons/sprites/icons.svg#olymp-like-post-icon'></use>
                </svg>",['user/like', 'id' => $this->id], ['class' => 'btn btn-control']);
            }
            if(array_search(Yii::$app->user->id, $this->editableUsers)){
                echo Html::a("<svg class='olymp-share-icon'>
                    <use xlink:href='theme/svg-icons/sprites/icons.svg#olymp-share-icon'></use>
                </svg>",['user/dejar-compartir', 'id' => $this->id], ['class' => 'btn btn-control', 'id' => 'compartido_but']);
            }else{
                echo Html::a("<svg class='olymp-share-icon'>
                    <use xlink:href='/theme/svg-icons/sprites/icons.svg#olymp-share-icon'></use>
                </svg>",['user/compartir', 'id' => $this->id], ['class' => 'btn btn-control']);
            }
            echo "</div>
        </article>
        <!-- .. end Post -->                
    </div>";
    }
}
