<?php
/* @var $this BlogTagsController */
/* @var $model BlogTags */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'tagId'); ?>
		<?php echo $form->textField($model,'tagId'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tagName'); ?>
		<?php echo $form->textField($model,'tagName',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->