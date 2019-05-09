<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 registration-login-form ">
    <h2 class="title">Registro</h2>
    <div class="content">
        <?php $form = ActiveForm::begin([
            'action' => ['/user/create'],
            'id' => 'registro',
            'class' => 'form-control-sm',
            'method' => 'post',
        ]); ?>
            
        <div id='p1' >
            <div class='col-sm-12 col-md-12'>
                <?= $form->field($model, 'username',
                    ['options' => [
                        'id' => 'alias_c',
                        'class' => ''
                        ],
                    'inputOptions' => [
                        'id' => 'alias',
                        'class' => 'form-control',
                        'autocomplete' => 'off']
                    ])->label("Alias") ?>
            </div>
            
            <br/>
            <hr>
            <br/>

            <div class='col-sm-12 col-md-12'>
                <?= $form->field($model, 'password',
                    ['options' => [
                        'class' => 'form-group label-floating is-empty',
                        'id' => 'psswd1_c'
                        ],
                    'inputOptions' => [
                    'id' => 'psswd1',
                    'class' => 'form-control',
                    'autocomplete' => 'off'
                ]])->passwordInput() ?>
            </div>
                    
            <div class='col-sm-12 col-md-12'>
                <?= $form->field($model, 'password',
                    ['options' => [
                        'class' => 'form-group label-floating is-empty',
                        'id' => 'psswd2_c',
                        ],
                    'inputOptions' => [
                        'id' => 'psswd2',
                        'class' => 'form-control',
                        'autocomplete' => 'off'
                ]])->passwordInput()->label('Repite contraseña')?>
            </div>

            <br/>
            <hr>
            <br/>
            <div class="col-sm-12">
                <button type="button" action='' id='subp1' class="btn btn-primary btn-md " disabled="disabled">Siguiente</button>
            </div>
        </div>
    
    

    <div id='p2' class='row' style="display: none;">
        <div class='col-sm-12 col-md-12'>
            <?= $form->field($model, 'name', [
                'options' => [
                    'class' => 'form-group label-floating is-empty',
                    'id' => 'nombre_c'
                ],
                'inputOptions' => [
                    'id' => 'nombre',
                    'class' => 'form-control',
                    'autocomplete' => 'off'
                ]])->label("Nombre") ?>
            </div>
        <br/>
        <hr>
        <br/>
        <div class='col-sm-12 col-md-12'>
            <div class="form-group">
                <label class="control-label">Fecha de nacimiento</label>
                <input NAME="user-birthday" type="date">
                <span class="input-group-addon">
                    <svg class="olymp-month-calendar-icon icon"><use xlink:href="theme/svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>
                </span>
            </div>
        </div>
        <br/>
        <hr>
        <br/>
        <div class="btn-group col-sm-12">
            <button type="button" action='' id='prep1' class="btn btn-grey btn-md" >Anterior</button>
            <button type="button" action='' id='subp2' class="btn btn-primary btn-md" disabled="disabled">Siguiente</button>
        </div>
    </div>
        

    <div id='p3' class='row' style="display:none;">
        <div class='col-sm-12 col-md-12'>
            <?= $form->field($model, 'email',['inputOptions' => [
            'id' => 'mail',
            'class' => 'form-control',
            'placeholder' => 'Correo electrónico',
            'autocomplete' => 'off'
        ]])->label(false) ?>
        </div>
        <br/>
        <hr>
        <br/>  
        <div class='col-sm-12 col-md-12'>
            <?= $form->field($model, 'centerCode',['inputOptions' => [
                'id' => 'centerCode',
                'class' => 'form-control',
                'placeholder' => 'Center code',
                'autocomplete' => 'off'
            ]])->passwordInput()->label(false) ?>
        </div>
        <br/>
        <hr>
        <br/>
        <div class="btn-group col-sm-12">
            <button type="button" action='' id='prep2' class="btn btn-grey btn-md" >Anterior</button>
            <?= Html::submitButton('Registrar',  ['class' => 'btn btn-yellow btn-md', 'id' => 'registrar', 'disabled' => 'disabled']) ?>
        </div>
    </div>
    </div>
    
   

    <?php ActiveForm::end(); ?>

</div>
