<?php
/* @var $this CommentsController */
/* @var $model Comments */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->name=>array('view','id'=>$model->commentId),
	'Update',
);

$this->menu=array(
	array('label'=>'List Comments', 'url'=>array('index')),
	array('label'=>'Create Comments', 'url'=>array('create')),
	array('label'=>'View Comments', 'url'=>array('view', 'id'=>$model->commentId)),
	array('label'=>'Manage Comments', 'url'=>array('admin')),
);
?>

<h1>Update Comments <?php echo $model->commentId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>