<?php
/* @var $this FandomsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Фандомы',
);

$this->menu=array(
	array('label'=>'Создание', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Фандомы</h1>

<!-- Выводим просто список, их немного, поэтому нам виджет не нужен -->
<p>У нас имеются следующие фандомы:</p>

<? foreach ($models as $modelFandom): ?>
    <p>
        <a href="<?= $modelFandom->fandomId; ?>" class="a-inline"><?= $modelFandom->fandomName; ?></a>
    </p>                            
<? endforeach; ?>


