<?php
/* @var $this GenreController */
/* @var $model Genre */

$this->breadcrumbs=array(
	'Жанры'=>array('index'),
	$model->genreId=>array('view','id'=>$model->genreId),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->genreId)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновить жанр № <?php echo $model->genreId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>