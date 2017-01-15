<?php
/* @var $this JokesController */
/* @var $model Jokes */

$this->breadcrumbs=array(
	'Jokes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Jokes', 'url'=>array('index')),
	array('label'=>'Manage Jokes', 'url'=>array('admin')),
);
?>

<h1>Create Jokes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>