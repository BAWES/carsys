<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>The Annoying Car Database</h1>

        <p class="lead">Secret Stuff Happens Here</p>

        <p><a class="btn btn-lg btn-success" href="<?= Url::to(["plate/index"]); ?>">Get started</a></p>
    </div>
</div>
