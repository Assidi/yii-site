<?php
/* @var $this BlogController */
/* @var $model Blog */

$this->breadcrumbs=array(
	'Blogs'=>array('index'),
	$model->title=>array('view','id'=>$model->postId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Blog', 'url'=>array('index')),
	array('label'=>'Create Blog', 'url'=>array('create')),
	array('label'=>'View Blog', 'url'=>array('view', 'id'=>$model->postId)),
	array('label'=>'Manage Blog', 'url'=>array('admin')),
);
?>

<h1>Update Blog <?php echo $model->postId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>