<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Jamaah */

$this->title = 'Update Jamaah: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jamaahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jamaah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
