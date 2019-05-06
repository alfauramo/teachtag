<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Foto".
 *
 * @property int $id
 * @property string $ruta
 * @property string $fecha
 * @property int $user_id
 *
 * @property User $user
 */
class Foto extends \yii\db\ActiveRecord
{

    //public $Foto;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fotos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ruta', 'fecha', 'user_id'], 'required'],
            [['fecha'], 'safe'],
            [['user_id', 'id'], 'integer'],
            [['ruta'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ruta' => 'Ruta',
            'fecha' => 'Fecha',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return FotoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FotoQuery(get_called_class());
    }

     public function beforeDelete()
    {
        
        @unlink($this->ruta);
        return parent::beforeDelete();
    }

    public function getFileName() {
        $data = pathinfo($this->ruta);
        return $data['basename'];
    }

    public function getFileSize() {
        return $this->formatBytes(filesize($this->ruta));
    }

    public function formatBytes($bytes) {
        if ( $bytes >= 1073741824 ) {
            $bytes = number_format( $bytes / 1073741824, 2 ) . ' GB';
        } elseif ( $bytes >= 1048576 ) {
            $bytes = number_format( $bytes / 1048576, 2 ) . ' MB';
        } elseif ( $bytes >= 1024 ) {
            $bytes = number_format( $bytes / 1024, 2 ) . ' KB';
        } elseif ( $bytes > 1 ) {
            $bytes = $bytes . ' bytes';
        } elseif ( $bytes == 1 ) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    public function getFilePath($id = false) {
        if($id == false)
            $id = Yii::$app->user->id;
        return './img/' . $id . '/galeria/' . $this->ruta;
    }

    public function afterFind(){

        parent::afterFind();

        $fecha = $this->fecha;
        if(!empty($fecha)){
            $fecha = Yii::$app->formatter->asDateTime($fecha, 'php:d-m-Y H:i:s');
            $this->fecha = $fecha;
        }
            
    }

    public function beforeSave($insert) {

        if (!parent::beforeSave($insert)) return false;

        $fecha = $this->fecha;
        if(!empty($fecha)){
            $fecha = Yii::$app->formatter->asDateTime($fecha, 'php:Y-m-d H:i:s');
            $this->fecha = $fecha;
        }
       
        return true;
    } 

    public function actualizarFecha(){
        $this->fecha_descarga = date("Y-m-d H:i:s");
        $this->save();
    }

    

}
