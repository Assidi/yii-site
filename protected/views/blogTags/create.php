<?php
/* @var $this BlogTagsController */
/* @var $model BlogTags */

$this->breadcrumbs=array(
	'Тэги'=>array('index'),
	'Новый тэг',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новый тэг</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>