<?php
/* @var $this BlogController */
/* @var $model Blog */

$this->breadcrumbs=array(
	'Блог'=>array('index'),
	'Новая запись',
);

$this->menu=array(
	array('label'=>'Все записи', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новая запись</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>