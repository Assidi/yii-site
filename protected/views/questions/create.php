<?php
/* @var $this QuestionsController */
/* @var $model Questions */

$this->breadcrumbs=array(
	'Вопросы'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список вопросов', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новый вопрос</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>