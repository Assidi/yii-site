<?php
/* @var $this FandomsController */
/* @var $model Fandoms */

$this->breadcrumbs=array(
	'Fandoms'=>array('index'),
	$model->fandomId=>array('view','id'=>$model->fandomId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Fandoms', 'url'=>array('index')),
	array('label'=>'Create Fandoms', 'url'=>array('create')),
	array('label'=>'View Fandoms', 'url'=>array('view', 'id'=>$model->fandomId)),
	array('label'=>'Manage Fandoms', 'url'=>array('admin')),
);
?>

<h1>Update Fandoms <?php echo $model->fandomId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>