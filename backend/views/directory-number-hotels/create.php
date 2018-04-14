<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DirectoryNumberHotels */

$this->title = 'Добавить гостиничный номер';
$this->params['breadcrumbs'][] = ['label' => 'Номера гостиницы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="directory-number-hotels-create">

	<h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
