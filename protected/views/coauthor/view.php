<?php
/* @var $this CoauthorController */
/* @var $model Coauthor */

$this->breadcrumbs=array(
	'Соавторы'=>array('index'),
	$model->coauthorId,
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Обновить', 'url'=>array('update', 'id'=>$model->coauthorId)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->coauthorId),'confirm'=>'Вы действительно хотите удалить этот элемент?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Соавтор №<?php echo $model->coauthorId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'coauthorId',
		'coauthorName',
	),
    'cssFile'=>'main.css',
)); ?>
