<?php
/* @var $this BlogCommentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Комментарии блога',
);

$this->menu=array(
	
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Комментарии блога</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
