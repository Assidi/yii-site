<?php
/* @var $this FandomsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fandoms',
);

$this->menu=array(
	array('label'=>'Create Fandoms', 'url'=>array('create')),
	array('label'=>'Manage Fandoms', 'url'=>array('admin')),
);
?>

<h1>Fandoms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
