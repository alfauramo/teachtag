<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "center".
 *
 * @property int $id
 * @property string $nombre
 * @property string $poblacion
 * @property string $provincia
 * @property string $centerCode
 */
class Center extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'center';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'poblacion', 'provincia', 'centerCode'], 'required'],
            [['nombre'], 'string', 'max' => 100],
            [['poblacion', 'provincia'], 'string', 'max' => 50],
            [['centerCode'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'poblacion' => 'Poblacion',
            'provincia' => 'Provincia',
            'centerCode' => 'Center Code',
        ];
    }

    /**
     * {@inheritdoc}
     * @return CenterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CenterQuery(get_called_class());
    }
}
