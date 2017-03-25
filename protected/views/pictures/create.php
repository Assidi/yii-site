<?php
/* @var $this PicturesController */
/* @var $model Pictures */

$this->breadcrumbs=array(
	'Pictures'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pictures', 'url'=>array('index')),
	array('label'=>'Manage Pictures', 'url'=>array('admin')),
);
?>

<h1>Create Pictures</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>