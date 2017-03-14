<?php
/* @var $this BlogController */
/* @var $model Blog */

$this->breadcrumbs=array(
	'Блог'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Новая запись', 'url'=>array('create')),
	array('label'=>'Обновить', 'url'=>array('update', 'id'=>$model->postId)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->postId),'confirm'=>'Вы действительно хотите удалить этот элемент?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1><?=$model->title; ?></h1>
<p><i>Опубликовано: <?=AssidiHelper::dateFormat($model->date) ?></i></p>
<p>
<?=AssidiHelper::insertBreakes($model->text)?>
</p>
<? print_r($model->tags);?>



