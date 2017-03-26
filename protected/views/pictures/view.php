<?php
/* @var $this PicturesController */
/* @var $model Pictures */

$this->breadcrumbs=array(
	'Рисунки'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Обновить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Рисунок №<?php echo $model->id; ?></h1>

<p><?=$model->description ?></p>
<img src="/images/<?= $model->image; ?>"/>

