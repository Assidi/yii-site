<?php
/* @var $this CharactersController */
/* @var $model Characters */

$this->breadcrumbs=array(
	'Персонажи'=>array('index'),
	$model->characterId=>array('view','id'=>$model->characterId),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->characterId)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновить персонажа № <?php echo $model->characterId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>