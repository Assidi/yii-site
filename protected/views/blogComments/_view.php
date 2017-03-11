<?php
/* @var $this BlogCommentsController */
/* @var $data BlogComments */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('commentId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->commentId), array('view', 'id'=>$data->commentId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('postId')); ?>:</b>
	<?php echo CHtml::encode($data->postId); ?>
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