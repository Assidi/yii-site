<?php
/* @var $this CoauthorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Соавторы',
);

$this->menu=array(
	array('label'=>'Создание', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Соавторы</h1>

<?php
    print_r($models);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
