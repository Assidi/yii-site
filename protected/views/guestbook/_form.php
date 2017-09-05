<?php
/* @var $this GuestbookController */
/* @var $model Guestbook */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'guestbook-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span> являются обязательными.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'name'); ?><br />
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email'); ?><br />
		<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'text'); ?><br />
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>
    
    <!--
<?if(CCaptcha::checkRequirements() && Yii::app()->user->isGuest):?>
        <?=CHtml::activeLabelEx($model, 'verifyCode')?>
        <?$this->widget('CCaptcha',array('buttonLabel'=>'Обновить картинку'))?><br />
        <?=CHtml::activeTextField($model, 'verifyCode')?>
    <?endif?>
-->
    <!-- Выводим проверочный вопрос, только для гостя -->
    <?if(Yii::app()->user->isGuest):?>
        <div class="form-group">
            <label>Ответьте на простой проверочный вопрос:</label><br />
            <?php $q = Questions::randomQuestion(); ?>
            <p><?= $q['question'];?></p>
            <?=CHtml::activeTextField($model, 'verifyAnswer')?>
        </div>
    <?endif?>
    	

	<div class="form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->