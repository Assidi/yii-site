<?php
/* @var $this FandomsController */
/* @var $data Fandoms */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('fandomId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->fandomId), array('view', 'id'=>$data->fandomId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fandomName')); ?>:</b>
	<?php echo CHtml::encode($data->fandomName); ?>
	<br />


</div>