<?php
/* @var $this PicturesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Рисунки',
);

$this->menu=array(
	array('label'=>'Создание', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Рисунки</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
