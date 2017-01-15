<?php
/* @var $this CoauthorController */
/* @var $model Coauthor */

$this->breadcrumbs=array(
	'Coauthors'=>array('index'),
	$model->coauthorId,
);

$this->menu=array(
	array('label'=>'List Coauthor', 'url'=>array('index')),
	array('label'=>'Create Coauthor', 'url'=>array('create')),
	array('label'=>'Update Coauthor', 'url'=>array('update', 'id'=>$model->coauthorId)),
	array('label'=>'Delete Coauthor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->coauthorId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Coauthor', 'url'=>array('admin')),
);
?>

<h1>View Coauthor #<?php echo $model->coauthorId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'coauthorId',
		'coauthorName',
	),
)); ?>
