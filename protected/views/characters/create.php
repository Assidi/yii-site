<?php
/* @var $this CharactersController */
/* @var $model Characters */

$this->breadcrumbs=array(
	'Characters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Characters', 'url'=>array('index')),
	array('label'=>'Manage Characters', 'url'=>array('admin')),
);
?>

<h1>Create Characters</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>