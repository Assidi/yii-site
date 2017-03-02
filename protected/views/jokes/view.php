<?php
/* @var $this JokesController */
/* @var $model Jokes */

$this->breadcrumbs=array(
	'Приколы'=>array('index'),
	$model->jokeId,
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Обновить', 'url'=>array('update', 'id'=>$model->jokeId)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->jokeId),'confirm'=>'Вы действительно хотите удалить этот элемент?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Прикол №<?php echo $model->jokeId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'jokeId',
		'jokeText',
	),
    'cssFile'=>'main.css',
)); ?>
