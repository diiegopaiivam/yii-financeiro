<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\Bill;

/* @var $this yii\web\View */
/* @var $model app\models\Bill */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bill-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'category_id')->dropDownList(Category::getOptions(), [
            'prompt' => ':: Selecione ::'
        ]) ?>

        <?= $form->field($model, 'type')->dropDownList(Bill::getTypeOptions(), [
            'prompt' => ':: Selecione ::'
        ]) ?>

        <?= $form->field($model, 'date')->textInput() ?>

        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status')->dropDownList(Bill::getStatusOptions(), [
            'prompt' => ':: Selecione ::'
        ]) ?>

        <div class="form-group">
            <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
