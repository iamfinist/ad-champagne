<?php

use app\models\Integration;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Event $model */
/** @var Integration[] $integrations */

$this->title = 'Создать событие';
$this->params['breadcrumbs'][] = ['label' => 'События', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'integrations' => $integrations
    ]) ?>

</div>
