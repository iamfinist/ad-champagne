<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Integration $model */

$this->title = 'Создать поставщика';
$this->params['breadcrumbs'][] = ['label' => 'Поставщики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="integration-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
