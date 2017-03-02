<?php
/* @var $this JokesController */
/* @var $model Jokes */

$this->breadcrumbs=array(
	'Приколы'=>array('index'),
	$model->jokeId=>array('view','id'=>$model->jokeId),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->jokeId)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновить прикол № <?php echo $model->jokeId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>