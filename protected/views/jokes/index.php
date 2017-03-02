<?php
/* @var $this JokesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Приколы',
);

$this->menu=array(
	array('label'=>'Создание', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Приколы</h1>

<? foreach ($models as $modelJokes): ?>
    <div class="view">
    	<b>Номер:</b>
    	<a href="<?= $modelJokes->jokeId; ?>" class="a-inline"><?=$modelJokes->jokeId; ?></a><br />
        <? $joke = AssidiHelper::insertBreakes($modelJokes->jokeText); ?>
        <?= $joke; ?>	
    </div>                               
<? endforeach; ?>

