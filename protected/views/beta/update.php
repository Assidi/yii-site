<?php
/* @var $this BetaController */
/* @var $model Beta */

$this->breadcrumbs=array(
	'Беты'=>array('index'),
	$model->betaId=>array('view','id'=>$model->betaId),
	'Обновить',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->betaId)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Обновить бету № <?php echo $model->betaId; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>