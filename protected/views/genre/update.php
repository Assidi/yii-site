<?php
/* @var $this GenreController */
/* @var $model Genre */

$this->breadcrumbs=array(
	'Genres'=>array('index'),
	$model->genreId=>array('view','id'=>$model->genreId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Genre', 'url'=>array('index')),
	array('label'=>'Create Genre', 'url'=>array('create')),
	array('label'=>'View Genre', 'url'=>array('view', 'id'=>$model->genreId)),
	array('label'=>'Manage Genre', 'url'=>array('admin')),
);
?>

<h1>Update Genre <?php echo $model->genreId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>