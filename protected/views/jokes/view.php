<?php
/* @var $this JokesController */
/* @var $model Jokes */

$this->breadcrumbs=array(
	'Jokes'=>array('index'),
	$model->jokeId,
);

$this->menu=array(
	array('label'=>'List Jokes', 'url'=>array('index')),
	array('label'=>'Create Jokes', 'url'=>array('create')),
	array('label'=>'Update Jokes', 'url'=>array('update', 'id'=>$model->jokeId)),
	array('label'=>'Delete Jokes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->jokeId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Jokes', 'url'=>array('admin')),
);
?>

<h1>View Jokes #<?php echo $model->jokeId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'jokeId',
		'jokeText',
	),
)); ?>
