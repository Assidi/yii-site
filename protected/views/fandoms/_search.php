<?php
/* @var $this FandomsController */
/* @var $model Fandoms */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'fandomId'); ?>
		<?php echo $form->textField($model,'fandomId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fandomName'); ?>
		<?php echo $form->textField($model,'fandomName',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->