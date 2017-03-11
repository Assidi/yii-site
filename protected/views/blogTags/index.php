<?php
/* @var $this BlogTagsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Тэги',
);

$this->menu=array(
	array('label'=>'Новый тэг', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Тэги</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
