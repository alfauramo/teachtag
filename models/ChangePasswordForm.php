<?php
namespace app\models;

use Yii;
use yii\base\Model;


class ChangePasswordForm extends Model
{
	public $password;
	public $password_repeat;
	public $email;
	public function rules() {
		return [
			['email', 'email'],
	        [['password', 'password_repeat'], 'required'],
	        ['password', 'string', 'min' => 6],
	        ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Las contraseñas no coinciden" ],
        ];
	}

	public function attributeLabels()
	{
		return [
			'password' => 'Contraseña',
			'password_repeat' => 'Repita contraseña',
		];
	}