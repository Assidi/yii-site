<?php
/* @var $this CoauthorController */
/* @var $model Coauthor */

$this->breadcrumbs=array(
	'Coauthors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Coauthor', 'url'=>array('index')),
	array('label'=>'Manage Coauthor', 'url'=>array('admin')),
);
?>

<h1>Create Coauthor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>