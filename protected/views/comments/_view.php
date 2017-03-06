<?php
/* @var $this CommentsController */
/* @var $data Comments */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('commentId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->commentId), array('view', 'id'=>$data->commentId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fanficId')); ?>:</b>
	<?php echo CHtml::encode($data->fanficId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />


</div>