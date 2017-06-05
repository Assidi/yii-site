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

	<p class="note">Поля, отмеченные <span class="required">*</span> являются обязательными.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateWrite')." гггг-мм-дд"; ?> 
        <?php
		  $this->widget('CMaskedTextField', array(
			'model' => $model,
			'attribute' => 'dateWrite',
			'mask' => '9999-99-99',
			'placeholder' => '*',
			'completed' => 'function(){console.log("ok");}',
		));
		?>
		<?php echo $form->error($model,'dateWrite'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'raiting'); ?>
		<?php echo $form->radioButtonList($model,'raiting',array('G'=>'G','PG'=>'PG', 'PG-13'=>'PG-13', 'R'=>'R', 'NC-17'=>'NC-17')); ?>
		<?php echo $form->error($model,'raiting'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pairing'); ?>
		<?php echo $form->textField($model,'pairing',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'pairing'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'summary'); ?>
		<?php echo $form->textArea($model,'summary',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'summary'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textArea($model,'note',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dedication'); ?>
		<?php echo $form->textArea($model,'dedication',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'dedication'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beta'); ?>		
        <?php echo $form->dropDownList($model, 'beta', Beta::getList()); ?>
		<?php echo $form->error($model,'beta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coauthor'); ?>
		<?php echo $form->dropDownList($model, 'coauthor', Coauthor::getList()); ?>
		<?php echo $form->error($model,'coauthor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'category'); ?>
		<?php echo $form->radioButtonList($model,'category',array('Джен'=>'Джен', 'Гет'=>'Гет', 'Слэш'=>'Слэш', 'Фемслэш'=>'Фемслэш')); ?>
		<?php echo $form->error($model,'category'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Обновить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->