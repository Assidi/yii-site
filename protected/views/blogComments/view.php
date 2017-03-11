<?php
/* @var $this BlogCommentsController */
/* @var $model BlogComments */

$this->breadcrumbs=array(
	'Blog Comments'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List BlogComments', 'url'=>array('index')),
	array('label'=>'Create BlogComments', 'url'=>array('create')),
	array('label'=>'Update BlogComments', 'url'=>array('update', 'id'=>$model->commentId)),
	array('label'=>'Delete BlogComments', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->commentId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BlogComments', 'url'=>array('admin')),
);
?>

<h1>View BlogComments #<?php echo $model->commentId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'commentId',
		'postId',
		'name',
		'email',
		'date',
		'text',
	),
)); ?>
