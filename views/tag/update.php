<?php
use app\models\User;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tag */
$user = User::findOne($model->creator_id);
$this->title = 'TeachTag - Editar Tag: ' . $model->id . ' del usuario @'.$user->username;
$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Editar';

?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card-group">
            <div class="card p-4 login-form">
		    	<h1><?= Html::encode($this->title) ?></h1>
		   		 <?= $this->render('_form', [
		        'model' => $model,
		   		 ]) ?>
			</div>
		</div>
	</div>
</div>
