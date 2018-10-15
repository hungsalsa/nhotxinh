<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Imgprolist */

$this->title = 'Create Imgprolist';
$this->params['breadcrumbs'][] = ['label' => 'Imgprolists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imgprolist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listPro' => $listPro,
    ]) ?>

</div>
