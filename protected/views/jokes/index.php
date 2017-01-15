<?php
/* @var $this JokesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jokes',
);

$this->menu=array(
	array('label'=>'Create Jokes', 'url'=>array('create')),
	array('label'=>'Manage Jokes', 'url'=>array('admin')),
);
?>

<h1>Jokes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
