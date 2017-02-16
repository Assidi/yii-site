<?php
/* @var $this CharactersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Characters',
);

$this->menu=array(
	array('label'=>'Create Characters', 'url'=>array('create')),
	array('label'=>'Manage Characters', 'url'=>array('admin')),
);
?>

<h1>Characters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
