<?php
/* @var $this GuestbookController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Гостевая книга',
);

$this->menu=array(
	array('label'=>'Новая запись', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Гостевая книга</h1>
<h2>Сделать запись</h2>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'pagerCssClass' => 'assidi-pagination',
)); ?>

