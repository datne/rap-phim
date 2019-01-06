<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\City */

$this->title = $model->cityname;
$this->params['breadcrumbs'][] = ['label' => 'Cities', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="city-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cityname',
            [
                'label' => 'Created at',
                'value' => function ($model) {
                    $timezone  = +7;
                    return gmdate('d-m-Y H:i:s',$model->created_at + 3600*($timezone));
                }
            ],
            [
                'label' => 'Updated at',
                'value' => function ($model) {
                    $timezone  = +7;
                    return gmdate('d-m-Y H:i:s',$model->updated_at + 3600*($timezone));
                }
            ],
            'isDeleted',
            'deletedUserId',
            'deletedTime:datetime',
        ],
    ]) ?>

</div>
