<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\web\JsExpression;

    $form = ActiveForm::begin(
        [
            'options' => 
            [
                'class' => 'search-bar w-search notification-list friend-requests',
                'id' => 'buscador'
            ]
        ]);
    $url = Url::to(['user/buscar']);
    echo $form->field($user, 'busqueda')->widget(Select2::classname(), 
        [
            'options' => ['placeholder' => 'Buscar amigos...'],
            'pluginOptions' => 
            [    
                'allowClear' => true,
                'minimumInputLength' => 3,
                'language' => 'es',
                'placeholder' => 'Buscar amigos...',
            [
                'errorLoading' => new JsExpression("function () { return 'Espere los resultados ...'; }"),
            ],
                'ajax' => 
            [
                'url' => $url,
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { 
                                return {q:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression("function (markup) { return markup; }"),
            'templateResult' => new JsExpression("function(usuario) {
                console.log(usuario); 
                return usuario.nombre; }"),
            'templateSelection' => new JsExpression("function (usuario) {
                if(id !== ''){
                    window.location.replace('/user/perfil/?id=' + usuario.id);
                }
                return usuario.nombre; }"),
            ],
        ])->label("Búsqueda de usuarios...");
    ActiveForm::end(); 
?>