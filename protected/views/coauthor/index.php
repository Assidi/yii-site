<?php
/* @var $this CoauthorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Coauthors',
);

$this->menu=array(
	array('label'=>'Create Coauthor', 'url'=>array('create')),
	array('label'=>'Manage Coauthor', 'url'=>array('admin')),
);
?>

<h1>Coauthors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
