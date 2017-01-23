<?php
/* @var $this FanfController */
/* @var $model Fanf */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fanf-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'month'); ?>
		<?php echo $form->textField($model,'month'); ?>
		<?php echo $form->error($model,'month'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'datePublish'); ?>
		<?php echo $form->textField($model,'datePublish'); ?>
		<?php echo $form->error($model,'datePublish'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'raiting'); ?>
		<?php echo $form->radioButtonList($model,'raiting',array('G','PG', 'PG-13', 'R', 'NC-17')); ?>
		<?php echo $form->error($model,'raiting'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pairing'); ?>
		<?php echo $form->textField($model,'pairing',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'pairing'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'summary'); ?>
		<?php echo $form->textField($model,'summary',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'summary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dedication'); ?>
		<?php echo $form->textField($model,'dedication',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'dedication'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'size'); ?>
		<?php echo $form->textField($model,'size'); ?>
		<?php echo $form->error($model,'size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beta'); ?>
		<?php echo $form->textField($model,'beta'); ?>
		<?php echo $form->error($model,'beta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coauthor'); ?>
		<?php echo $form->textField($model,'coauthor'); ?>
		<?php echo $form->error($model,'coauthor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->radioButtonList($model,'category',array('Джен', 'Гет', 'Слэш', 'Фемслэш')); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->