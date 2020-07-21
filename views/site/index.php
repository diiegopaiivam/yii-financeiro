<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Sistema Financeiro Pessoal';

?>

<div class="site-index">
    <div class="jumbotron">
        <h1>Sistema Financeiro</h1>
        <p class="lead">Organização de suas finanças pessoais</p>
        <p>
            <?= Html::a('<i class="glyphicon glyphicon-plus-sign"></i> Criar um Lançamento', ['/bills/create'], [
                'title' => 'Criar um lançamento agora',
                'class' => 'btn btn-lg btn-success'])
            ?>
        </p>

        <p>
            <?= Html::a('Ver Relatórios', ['/reports/index'], [
                'title' => 'Ver meus relatórios',
                'class' => 'btn btn-sm btn-link'])
            ?>
        </p>
    </div>
</div>