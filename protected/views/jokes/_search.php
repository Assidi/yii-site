<?php
/* @var $this JokesController */
/* @var $model Jokes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'jokeId'); ?>
		<?php echo $form->textField($model,'jokeId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jokeText'); ?>
		<?php echo $form->textField($model,'jokeText',array('size'=>60,'maxlength'=>800)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->