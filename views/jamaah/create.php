<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Jamaah */

$this->title = 'Create Jamaah';
$this->params['breadcrumbs'][] = ['label' => 'Jamaahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jamaah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
