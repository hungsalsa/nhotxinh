<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\quantri\models\Dikem */

$this->title = 'Create Dikem';
$this->params['breadcrumbs'][] = ['label' => 'Dikems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dikem-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
