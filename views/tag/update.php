<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tag */

$this->title = 'Editar Tag: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Editar';
?>
<div class="tag-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php var_dump($model->users); ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
