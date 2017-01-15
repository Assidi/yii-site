<?php
/* @var $this BetaController */
/* @var $model Beta */

$this->breadcrumbs=array(
	'Betas'=>array('index'),
	$model->betaId=>array('view','id'=>$model->betaId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Beta', 'url'=>array('index')),
	array('label'=>'Create Beta', 'url'=>array('create')),
	array('label'=>'View Beta', 'url'=>array('view', 'id'=>$model->betaId)),
	array('label'=>'Manage Beta', 'url'=>array('admin')),
);
?>

<h1>Update Beta <?php echo $model->betaId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>