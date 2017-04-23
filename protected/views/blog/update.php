<?php
/* @var $this BlogController */
/* @var $model Blog */

$this->breadcrumbs=array(
	'Блог'=>array('index'),
	$model->title=>array('view','id'=>$model->postId),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->postId)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Update Blog <?php echo $model->postId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>