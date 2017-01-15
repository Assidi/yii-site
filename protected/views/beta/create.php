<?php
/* @var $this BetaController */
/* @var $model Beta */

$this->breadcrumbs=array(
	'Betas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Beta', 'url'=>array('index')),
	array('label'=>'Manage Beta', 'url'=>array('admin')),
);
?>

<h1>Create Beta</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>