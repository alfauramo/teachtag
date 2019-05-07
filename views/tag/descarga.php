<?php

use yii\helpers\Html;
use app\models\Tag;

/* @var $this yii\web\View */
/* @var $model app\models\Tag */

$this->title = 'Añadir Tag';
$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$model = Tag::findOne($_GET['id']);
?>
<div class="tag-create">
	
    <?= $this->render('_imprimir', [
        'model' => $model,
    ]) ?>
</div>
