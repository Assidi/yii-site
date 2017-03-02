

<?php
/* @var $this CoauthorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Соавторы',
);

$this->menu=array(
	array('label'=>'Создание', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Соавторы</h1>

<!-- Выводим просто список, их немного, поэтому нам виджет не нужен -->
<p>У нас имеются следующие соавторы:</p>

<? foreach ($models as $modelCoauthor): ?>
    <p>
        <a href="<?= $modelCoauthor->coauthorId; ?>" class="a-inline"><?= $modelCoauthor->coauthorName; ?></a>
    </p>                            
<? endforeach; ?>
