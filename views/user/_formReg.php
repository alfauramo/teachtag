<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container">

    <?php $form = ActiveForm::begin([
        'action' => ['/user/create'],
        'id' => 'registro',
    ]); ?>
        
    <div id='p1'>
        <div class='row'>
            <div class='col-sm-10 col-md-10'>
                <?= $form->field($model, 'username',['inputOptions' => [
                    'id' => 'alias',
                    'class' => 'form-control',
                    'placeholder' => 'Alias',
                ]])->label(false) ?>
            </div>
                
            <div class='col-sm-5 col-md-5'>
                <?= $form->field($model, 'password',['inputOptions' => [
                    'id' => 'psswd1',
                    'class' => 'form-control in-line',
                    'placeholder' => 'Contraseña'
                ]])->label(false) ?>
            </div>
            
            <div class='col-sm-5 col-md-5'>
                <?= $form->field($model, 'password',['inputOptions' => [
                    'id' => 'psswd2',
                    'class' => 'form-control inline',
                    'placeholder' => 'Repite contraseña'
                ]])->label(false) ?>
            </div>
            <div class="col-sm-12">
                <button type="button" action='' id='subp1' class="btn btn-primary" disabled="disabled">Siguiente</button>
            </div>
        </div>
    </div>
    

    <div id='p2' class='row' style="display: none;">
        <div class='col-sm-5 col-md-5'>
            <?= $form->field($model, 'name', ['inputOptions' => [
                'id' => 'nombre',
                'class' => 'form-control in-line',
                'placeholder' => 'Nombre'
                ]])->label(false) ?>
            </div>
                
        <div class='col-sm-5 col-md-5'>
            
            <?= $form->field($model, 'birthday')->widget(DatePicker::classname(), [
                    'attribute' => 'birthday',
                    'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'options' => [
                        'placeholder' => 'Fecha de nacimiento',
                    ],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'dd-mm-yyyy',
                    ],
                ])->label(false); 
            ?>
        </div>

        <div class="col-sm-12">
            <button type="button" action='' id='subp2' class="btn btn-primary" disabled="disabled">Siguiente</button>
        </div>
    </div>
        
    
        

    <div id='p3' class='row' style="display:none;">
        <div class='col-sm-6 col-md-6'>
            <?= $form->field($model, 'email',['inputOptions' => [
            'id' => 'mail',
            'class' => 'form-control',
            'placeholder' => 'Correo electrónico'
        ]])->label(false) ?>
        </div>
                
        <div class='col-sm-4 col-md-4'>
            <?= $form->field($model, 'centerCode',['inputOptions' => [
                'id' => 'centerCode',
                'class' => 'form-control',
                'placeholder' => 'Center code'
            ]])->label(false) ?>
        </div>
        <div class="col-sm-12">
            <?= Html::submitButton('Registrar',  ['class' => 'btn btn-success', 'disabled' => 'disabled']) ?>
        </div>
    </div>

    
   

    <?php ActiveForm::end(); ?>

</div>
