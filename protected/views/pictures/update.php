<?php
/* @var $this PicturesController */
/* @var $model Pictures */

$this->breadcrumbs=array(
	'Pictures'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pictures', 'url'=>array('index')),
	array('label'=>'Create Pictures', 'url'=>array('create')),
	array('label'=>'View Pictures', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pictures', 'url'=>array('admin')),
);
?>

<h1>Update Pictures <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>