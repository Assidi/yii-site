<?php
/* @var $this BetaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Betas',
);

$this->menu=array(
	array('label'=>'Create Beta', 'url'=>array('create')),
	array('label'=>'Manage Beta', 'url'=>array('admin')),
);
?>

<h1>Betas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
