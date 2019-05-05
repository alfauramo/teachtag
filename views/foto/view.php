<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Fichero */

$this->title = $model->nombre;
?>
<div class="fichero-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Descargar', ['descargar', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'titulo',
            'notas:ntext',
            'nombre',
            'fecha',
        ],
    ]) ?>

</div>
