<?php
/* @var $this FandomsController */
/* @var $model Fandoms */

$this->breadcrumbs=array(
	'Фандомы'=>array('index'),
	$model->fandomId=>array('view','id'=>$model->fandomId),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->fandomId)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновить фандом № <?php echo $model->fandomId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>