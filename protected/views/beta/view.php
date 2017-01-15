<?php
/* @var $this BetaController */
/* @var $model Beta */

$this->breadcrumbs=array(
	'Betas'=>array('index'),
	$model->betaId,
);

$this->menu=array(
	array('label'=>'List Beta', 'url'=>array('index')),
	array('label'=>'Create Beta', 'url'=>array('create')),
	array('label'=>'Update Beta', 'url'=>array('update', 'id'=>$model->betaId)),
	array('label'=>'Delete Beta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->betaId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Beta', 'url'=>array('admin')),
);
?>

<h1>View Beta #<?php echo $model->betaId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'betaId',
		'betaName',
	),
)); ?>
