<?php
/* @var $this PicturesController */
/* @var $model Pictures */

$this->breadcrumbs=array(
	'Рисунки'=>array('index'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новый рисунок</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>