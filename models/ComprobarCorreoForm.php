<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ComprobarCorreoForm extends Model{
    public $email;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
        ];
    }

}