<?php
/* @var $this BetaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Беты',
);

$this->menu=array(
	array('label'=>'Создание', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Беты</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
