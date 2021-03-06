<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JamaahSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jamaah-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'tanggal_lahir') ?>

    <?= $form->field($model, 'jenis_kelamin') ?>

    <?= $form->field($model, 'alamat') ?>

    <?php // echo $form->field($model, 'no_telp') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'pekerjaan') ?>

    <?php // echo $form->field($model, 'pendidikan') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
