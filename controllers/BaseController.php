<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;


class BaseController extends Controller
{

    public $layout = 'olympus';
	public $adminUsers = [];
	public $users = []; 

    public function init(){
    	$users = User::find()->all();

    	foreach ($users as $user){
    		if($user->rol == User::ROL_USUARIO){
				$this->users[] = $user->id;    			
    		} 
    		if($user->rol == User::ROL_ADMINISTRADOR){
				$this->adminUsers[] = $user->id;    			
    		} 
    	}
    }

    public function isAdminUser() {
    	if (!Yii::$app->user->isGuest)
    		return in_array(Yii::$app->user->id, $this->adminUsers);
    	return false;
    }

    public function isNormalUser() {
    	if (!Yii::$app->user->isGuest)
    		return in_array(Yii::$app->user->id, $this->users);
    	return false;
    }

    /**
     * ¿Modificar el método para hacer una doble búsqueda 
     * y que devuelva resultados?
     */
    

}
