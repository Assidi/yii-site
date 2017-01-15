<?php
/* @var $this BetaController */
/* @var $data Beta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('betaId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->betaId), array('view', 'id'=>$data->betaId)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('betaName')); ?>:</b>
	<?php echo CHtml::encode($data->betaName); ?>
	<br />


</div>