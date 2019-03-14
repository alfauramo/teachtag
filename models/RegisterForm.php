<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $username;
    public $password;
    public $name;
    public $email;
    public $birthday;
    public $centerCode;
    public $mailCode;
    public $descripcion;

}