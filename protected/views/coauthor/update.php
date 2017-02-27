<?php
/* @var $this CoauthorController */
/* @var $model Coauthor */

$this->breadcrumbs=array(
	'Соавторы'=>array('index'),
	$model->coauthorId=>array('view','id'=>$model->coauthorId),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->coauthorId)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновить соавтора <?php echo $model->coauthorId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>