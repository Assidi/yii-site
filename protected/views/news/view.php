<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'Новости'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Обновить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы действительно хотите удалить этот элемент?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новость № <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'text',
	),
    'cssFile'=>'main.css',
)); ?>
