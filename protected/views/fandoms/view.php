<?php
/* @var $this FandomsController */
/* @var $model Fandoms */

$this->breadcrumbs=array(
	'Фандомы'=>array('index'),
	$model->fandomId,
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Обновить', 'url'=>array('update', 'id'=>$model->fandomId)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fandomId),'confirm'=>'Вы действительно хотите удалить этот элемент?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Фандом №<?php echo $model->fandomId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fandomId',
		'fandomName',
	),
    'cssFile'=>'main.css',
)); ?>
