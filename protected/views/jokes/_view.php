<?php
/* @var $this JokesController */
/* @var $data Jokes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('jokeId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->jokeId), array('view', 'id'=>$data->jokeId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jokeText')); ?>:</b>
	<?php echo CHtml::encode($data->jokeText); ?>
	<br />


</div>