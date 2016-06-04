<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\YatimSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yatims';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yatim-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Yatim', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'lembaga',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            // 'jenis_kelamin',
            // 'nama_ayah',
            // 'nama_ibu',
            // 'nomor_kk',
            // 'ukuran_baju',
            // 'ukuran_sepatu',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
