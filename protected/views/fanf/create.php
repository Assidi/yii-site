<?php
/* @var $this FanfController */
/* @var $model Fanf */

$this->breadcrumbs=array(
	'Фанфики'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новый фанфик</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>