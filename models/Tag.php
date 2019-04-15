<?php

namespace app\models;

use Yii;
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
                        'table' => 'tag_has_user', // Name of the junction table
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
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('tag_has_user', ['tag_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TagQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TagQuery(get_called_class());
    }
}