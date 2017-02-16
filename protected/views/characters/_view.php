<?php
/* @var $this CharactersController */
/* @var $data Characters */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('characterId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->characterId), array('view', 'id'=>$data->characterId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('characterName')); ?>:</b>
	<?php echo CHtml::encode($data->characterName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fandomId')); ?>:</b>
	<?php echo CHtml::encode($data->fandomId); ?>
	<br />


</div>