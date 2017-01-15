<?php
/* @var $this CoauthorController */
/* @var $data Coauthor */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('coauthorId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->coauthorId), array('view', 'id'=>$data->coauthorId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coauthorName')); ?>:</b>
	<?php echo CHtml::encode($data->coauthorName); ?>
	<br />


</div>