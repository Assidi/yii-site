<?php
/* @var $this FanfController */
/* @var $model Fanf */

$this->breadcrumbs=array(
	'Fanfs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Fanf', 'url'=>array('index')),
	array('label'=>'Create Fanf', 'url'=>array('create')),
	array('label'=>'Update Fanf', 'url'=>array('update', 'id'=>$model->ficId)),
	array('label'=>'Delete Fanf', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ficId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Fanf', 'url'=>array('admin')),
);
?>

<h1>View Fanf #<?php echo $model->ficId; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ficId',		
		'title',
		'year',
		'month',
		'datePublish',
		'raiting',
		'pairing',
		'summary',
		'note',
		'dedication',
		'size',
		'beta',
		'coauthor',
		'category',
        'text'
	),
)); ?>
