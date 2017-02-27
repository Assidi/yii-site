<?php
/* @var $this CharactersController */
/* @var $model Characters */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'characters-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span> являются обязательными.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'characterName'); ?>
		<?php echo $form->textField($model,'characterName',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'characterName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fandomId'); ?>
		<!--
<?php echo $form->textField($model,'fandomId'); ?>
-->
        <?= CHtml::dropDownList('Characters[fandomId]', $model->fandomId, Fandoms::getList()); ?>
		<?php echo $form->error($model,'fandomId'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->