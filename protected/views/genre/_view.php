<?php
/* @var $this GenreController */
/* @var $data Genre */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('genreId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->genreId), array('view', 'id'=>$data->genreId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('genreName')); ?>:</b>
	<?php echo CHtml::encode($data->genreName); ?>
	<br />


</div>