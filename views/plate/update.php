<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Plate */

$this->title = 'Update Plate: ' . ' ' . $model->plate_id;
$this->params['breadcrumbs'][] = ['label' => 'Plates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->plate_id, 'url' => ['view', 'id' => $model->plate_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="plate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
