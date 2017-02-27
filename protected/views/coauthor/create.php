<?php
/* @var $this CoauthorController */
/* @var $model Coauthor */

$this->breadcrumbs=array(
	'Соавторы'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Добавить соавтора</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>