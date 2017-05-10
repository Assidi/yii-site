<?php
/* @var $this CommentsController */
/* @var $model Comments */

$this->breadcrumbs=array(
	'Комментарии'=>array('index'),
	$model->name=>array('view','id'=>$model->commentId),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),	
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->commentId)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновить комментарий <?php echo $model->commentId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>