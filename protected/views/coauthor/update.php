<?php
/* @var $this CoauthorController */
/* @var $model Coauthor */

$this->breadcrumbs=array(
	'Coauthors'=>array('index'),
	$model->coauthorId=>array('view','id'=>$model->coauthorId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Coauthor', 'url'=>array('index')),
	array('label'=>'Create Coauthor', 'url'=>array('create')),
	array('label'=>'View Coauthor', 'url'=>array('view', 'id'=>$model->coauthorId)),
	array('label'=>'Manage Coauthor', 'url'=>array('admin')),
);
?>

<h1>Update Coauthor <?php echo $model->coauthorId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>