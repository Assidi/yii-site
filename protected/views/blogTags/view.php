<?php
/* @var $this BlogTagsController */
/* @var $model BlogTags */

$this->breadcrumbs=array(
	'Тэги'=>array('index'),
	$model->tagId,
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Обновить', 'url'=>array('update', 'id'=>$model->tagId)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tagId),'confirm'=>'Вы действительно хотите удалить этот элемент?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Тэг №<?php echo $model->tagId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tagId',
		'tagName',
	),
    'cssFile'=>'main.css',
)); ?>
