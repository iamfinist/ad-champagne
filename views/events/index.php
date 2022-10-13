<?php

use app\models\Event;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\search\EventSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'События';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать событие', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [

            'id',
            [
                'attribute' => 'created_at',
                'value' => function(Event $model) {
                    return (new DateTime())->setTimestamp($model->created_at)->setTimezone(new DateTimeZone("MSK"))->format("d-m-Y H:i:s");
                }
            ],
            'goal',
            'price',
            'integration_id',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function (Event $model) {
                    if ($model->status === Event::STATUS_CREATED)
                        return Html::a('Создано', 'confirm/?id=' . $model->id, ['title' => 'Подтвердить']);
                    else
                        return $model->getStatusLabel();
                }
            ],
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Event $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
