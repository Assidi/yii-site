<?php
/* @var $this FandomsController */
/* @var $model Fandoms */

$this->breadcrumbs=array(
	'Фандомы'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новый фандом</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>