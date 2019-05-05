<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Foto".
 *
 * @property int $id
 * @property string $titulo
 * @property string $notas
 * @property string $nombre
 * @property string $fecha
 * @property int $user_id
 * @property int $destinatario
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
            [['notas'], 'string'],
            [['nombre', 'fecha', 'user_id'], 'required'],
            [['fecha', 'fecha_descarga'], 'safe'],
            [['user_id', 'destinatario'], 'integer'],
            [['titulo', 'nombre'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'clienteid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'notas' => 'Notas',
            'nombre' => 'Nombre',
            'fecha' => 'Fecha',
            'fecha_descarga' => 'Fecha descarga',
            'user_id' => 'User ID',
            'destinatario' => 'User ID'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['clienteid' => 'user_id']);
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
        @unlink($this->ruta_Foto);
        return parent::beforeDelete();
    }

    public function getFileName() {
        $data = pathinfo($this->ruta_Foto);
        return $data['basename'];
    }

    public function getFileSize() {
        return $this->formatBytes(filesize($this->ruta_Foto));
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

    public function getFilePath() {
        return '/' . $this->ruta_Foto;
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
        
        $fecha_descarga = $this->fecha_descarga;
        if(!empty($fecha_descarga)){
            $fecha = Yii::$app->formatter->asDateTime($fecha_descarga, 'php:Y-m-d H:i:s');
            $this->fecha_descarga = $fecha_descarga;
        }
       
        return true;
    } 

    public function actualizarFecha(){
        $this->fecha_descarga = date("Y-m-d H:i:s");
        $this->save();
    }

    

}
