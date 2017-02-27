<?php
/* @var $this BetaController */
/* @var $model Beta */

$this->breadcrumbs=array(
	'Беты'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Новая бета</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>