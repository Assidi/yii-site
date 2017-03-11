<?php
/* @var $this BlogTagsController */
/* @var $model BlogTags */

$this->breadcrumbs=array(
	'Тэги'=>array('index'),
	$model->tagId=>array('view','id'=>$model->tagId),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->tagId)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновить тэг №<?php echo $model->tagId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>