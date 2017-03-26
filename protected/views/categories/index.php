<?php
/* @var $this CategoriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Разделы рисунков',
);

$this->menu=array(
	array('label'=>'Создание', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Разделы рисунков</h1>
<!-- Выводим просто список, их немного, поэтому нам виджет не нужен -->

<? foreach ($models as $modelCat): ?>
    <p>
        <a href="<?= $modelCat->id; ?>" class="a-inline"><?= $modelCat->name; ?></a>
    </p>                            
<? endforeach; ?>

