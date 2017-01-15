<?php
/* @var $this BetaController */
/* @var $model Beta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'betaId'); ?>
		<?php echo $form->textField($model,'betaId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'betaName'); ?>
		<?php echo $form->textField($model,'betaName',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->