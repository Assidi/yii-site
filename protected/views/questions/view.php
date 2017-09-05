<?php
/* @var $this QuestionsController */
/* @var $model Questions */

$this->breadcrumbs=array(
	'Вопросы'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список вопросов', 'url'=>array('index')),
	array('label'=>'Новый вопрос', 'url'=>array('create')),
	array('label'=>'Обновить', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Вопрос №<?php echo $model->id; ?></h1>

<p><b>Номер: </b><?=$model->id;?></p>
<p><b>Вопрос: </b><?=$model->question;?></p>
<p><b>Ответ: </b><?=$model->answer;?></p>
