<?php

use yii\helpers\Html;
use app\models\User;
use app\models\Tag;
/* @var $model yii\web\View */
/* @var $model app\models\Tag */
$id = false;
if($model->creator_id != $id){
    $user_c = User::findOne($id);
}
$user = User::findOne($model->creator_id);
             
	echo "<div class='ui-block'>
	<!-- Post -->
        <article class='hentry post'>
            
            <div class='post__author author vcard inline-items'>
                <img width='100' src='"; 
                if($user->img_perfil === null) 
                    echo './img/perfil.png'; 
                else 
                    echo $user->img_perfil; 
                echo "' alt='author'>
    
                <div class='author-date'>";
                echo "Autor: <span><strong>" . $user->name .'</strong><span> || Alias: <strong>@' . $user->username . '</strong>';

            echo "</div>
            <h3>Contenido</h3>
            <i>$model->texto</i>
        </article>
        <!-- .. end Post -->                
    </div>";
