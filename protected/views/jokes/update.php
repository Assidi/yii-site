<?php
/* @var $this JokesController */
/* @var $model Jokes */

$this->breadcrumbs=array(
	'Jokes'=>array('index'),
	$model->jokeId=>array('view','id'=>$model->jokeId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Jokes', 'url'=>array('index')),
	array('label'=>'Create Jokes', 'url'=>array('create')),
	array('label'=>'View Jokes', 'url'=>array('view', 'id'=>$model->jokeId)),
	array('label'=>'Manage Jokes', 'url'=>array('admin')),
);
?>

<h1>Update Jokes <?php echo $model->jokeId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>