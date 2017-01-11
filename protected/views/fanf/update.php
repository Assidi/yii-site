<?php
/* @var $this FanfController */
/* @var $model Fanf */

$this->breadcrumbs=array(
	'Fanfs'=>array('index'),
	$model->title=>array('view','id'=>$model->ficId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Fanf', 'url'=>array('index')),
	array('label'=>'Create Fanf', 'url'=>array('create')),
	array('label'=>'View Fanf', 'url'=>array('view', 'id'=>$model->ficId)),
	array('label'=>'Manage Fanf', 'url'=>array('admin')),
);
?>

<h1>Update Fanf <?php echo $model->ficId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>