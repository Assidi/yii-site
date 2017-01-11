<?php
/* @var $this FanfController */
/* @var $data Fanf */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ficId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ficId), array('view', 'id'=>$data->ficId)); ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('month')); ?>:</b>
	<?php echo CHtml::encode($data->month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datePublish')); ?>:</b>
	<?php echo CHtml::encode($data->datePublish); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('raiting')); ?>:</b>
	<?php echo CHtml::encode($data->raiting); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pairing')); ?>:</b>
	<?php echo CHtml::encode($data->pairing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('summary')); ?>:</b>
	<?php echo CHtml::encode($data->summary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dedication')); ?>:</b>
	<?php echo CHtml::encode($data->dedication); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('beta')); ?>:</b>
	<?php echo CHtml::encode($data->beta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coauthor')); ?>:</b>
	<?php echo CHtml::encode($data->coauthor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	*/ ?>

</div>