<?php
/* @var $this CharactersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Персонажи',
);

$this->menu=array(
	array('label'=>'Создание', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Персонажи</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'pager' => array('pageSize'=>100),
)); ?>
