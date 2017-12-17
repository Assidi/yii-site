<?php
/* @var $this FanfController */
/* @var $model Fanf */

$this->breadcrumbs=array(
	'Тексты'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
    array('label'=>'Статистика', 'url'=>array('statistics')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новый текст</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>