<?php
/**
 * Modelo del que se sirve la vista de inicio rápido para poder mostrar
 * los datos del buscador.
 */ 
namespace app\models;

use Yii;
use yii\base\Model;

class BusquedaForm extends Model
{
    public $busqueda;

    public function rules()
    {
        return [
            [['busqueda'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'busqueda' => 'Usuario',
        ];
    }
}