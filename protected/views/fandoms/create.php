<?php
/* @var $this FandomsController */
/* @var $model Fandoms */

$this->breadcrumbs=array(
	'Fandoms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Fandoms', 'url'=>array('index')),
	array('label'=>'Manage Fandoms', 'url'=>array('admin')),
);
?>

<h1>Create Fandoms</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>