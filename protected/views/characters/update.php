<?php
/* @var $this CharactersController */
/* @var $model Characters */

$this->breadcrumbs=array(
	'Characters'=>array('index'),
	$model->characterId=>array('view','id'=>$model->characterId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Characters', 'url'=>array('index')),
	array('label'=>'Create Characters', 'url'=>array('create')),
	array('label'=>'View Characters', 'url'=>array('view', 'id'=>$model->characterId)),
	array('label'=>'Manage Characters', 'url'=>array('admin')),
);
?>

<h1>Update Characters <?php echo $model->characterId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>