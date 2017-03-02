<?php
/* @var $this FanfController */
/* @var $model Fanf */

$this->breadcrumbs=array(
	'Фанфики'=>array('index'),
	$model->title=>array('view','id'=>$model->ficId),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->ficId)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновить фанфик № <?php echo $model->ficId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>