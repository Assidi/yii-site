<?php
/* @var $this FanfController */
/* @var $model Fanf */

$this->breadcrumbs=array(
	'Fanfs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Fanf', 'url'=>array('index')),
	array('label'=>'Manage Fanf', 'url'=>array('admin')),
);
?>

<h1>Create Fanf</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>