<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DirectoryNumberHotels */

$this->title = 'Редактировать гостиничный номер: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Номера гостиницы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактировать';
?>
<div class="directory-number-hotels-update">

	<h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
