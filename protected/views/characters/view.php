<?php
/* @var $this CharactersController */
/* @var $model Characters */

$this->breadcrumbs=array(
	'Characters'=>array('index'),
	$model->characterId,
);

$this->menu=array(
	array('label'=>'List Characters', 'url'=>array('index')),
	array('label'=>'Create Characters', 'url'=>array('create')),
	array('label'=>'Update Characters', 'url'=>array('update', 'id'=>$model->characterId)),
	array('label'=>'Delete Characters', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->characterId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Characters', 'url'=>array('admin')),
);
?>

<h1>View Characters #<?php echo $model->characterId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'characterId',
		'characterName',
		'fandomId',
	),
)); ?>
