<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Bill;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BillSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bill-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nova Conta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute'         => 'date',
                'format'            => 'date',
                'headerOptions'     => ['class' => 'text-center', 'style' => 'width: 115px'],
                'contentOptions'    => ['class' => 'text-center']
            ],
            'description',
            [
                'attribute'         => 'category_id',
                'headerOptions'     => ['class' => 'text-center', 'style' => 'width: 145px'],
                'contentOptions'    => ['class' => 'text-center'],
                'content'           => function(Bill $model, $key, $index, $column) {
                    return $model->category->name;
                }
            ],
            [
                'attribute'         => 'type',
                'headerOptions'     => ['class' => 'text-center', 'style' => 'width: 115px'],
                'contentOptions'    => ['class' => 'text-center'],
                'content'           => function(Bill $model, $key, $index, $column){
                    return $model->getTypeText();
                }
            ],
            [
                'attribute'         => 'amount',
                'headerOptions'     => ['class' => 'text-center', 'style' => 'width: 100px'],
                'contentOptions'    => ['class' => 'text-center']
            ],
            [
                'attribute'         => 'status',
                'headerOptions'     => ['class' => 'text-center', 'style' => 'width: 160px'],
                'contentOptions'    => ['class' => 'text-center'],
                'content'           => function(Bill $model, $key, $index, $column){
                    $labelClass = ($model->isOpened() ? 'label-warning' : 'label-success');
                    return '<span class="label '.$labelClass.'">'.$model->getStatusText().'</span>';
                }
            ],
            [
                'class'             => 'yii\grid\ActionColumn',
                'headerOptions'     => ['style' => 'width: 90px'],
                'contentOptions'    => ['class' => 'text-center'],
                'header'            => 'Ações'
            ],
        ],
    ]); ?>


</div>
