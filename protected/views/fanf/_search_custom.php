<?php
/* @var $this FanfController */
/* @var $model Fanf */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>	

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dateWrite'); ?>
		<?php echo $form->textField($model,'dateWrite'); ?>
	</div>	

	<div class="row">
		<?php echo $form->label($model,'raiting'); ?>
		<?php echo $form->radioButtonList($model,'raiting',array('G'=>'G','PG'=>'PG', 'PG-13'=>'PG-13', 'R'=>'R', 'NC-17'=>'NC-17')); ?>
	</div>    
    

	<div class="row">
		<?php echo $form->label($model,'summary'); ?>
		<?php echo $form->textField($model,'summary',array('size'=>60,'maxlength'=>500)); ?>
	</div>	

	<div class="row">
        <label>Размер</label>
		<input type="text" id="size" style="border: 0; color: #f6931f; font-weight: bold; width:300px;" />
        <div id="slider-range" style="width:300px; margin-left: 110px;"></div>
        <input type="hidden" name="Fanf[minSize]" id="min-size">
        <input type="hidden" name="Fanf[maxSize]" id="max-size">
        <div class="hidden" id="variables"
        data-min-size="<?= Fanf::MIN_SIZE; ?>"
        data-max-size="<?= Fanf::MAX_SIZE; ?>"
        data-current-min-size="<?= $minSize; ?>"
        data-current-max-size="<?= $maxSize; ?>"></div>
	</div>	

	<div class="row">
		<?php echo $form->label($model,'category'); ?>
		<?php echo $form->radioButtonList($model,'category',array('Джен'=>'Джен', 'Гет'=>'Гет', 'Слэш'=>'Слэш', 'Фемслэш'=>'Фемслэш')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
	</div>
    
    <div class="row">
		<label for="fandoms">Фандомы</label>
		<?= CHtml::dropDownList('fandoms[]', $fandom, $fandoms); ?>
	</div>
    
    <div class="row">
		<label for="characters">Персонажи</label>
		<?= CHtml::dropDownList('characters[]', $character, $characters); ?>
	</div>
	
	<div class="row">
		<label for="genres">Жанры</label>
		<?= CHtml::dropDownList('genres[]', $genre, $genres); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->

<script>
$(document).ready(function() {
    var currentMin = parseInt($('#variables').attr('data-current-min-size'));
    var currentMax = parseInt($('#variables').attr('data-current-max-size'));
    currentMin = currentMin ? currentMin : 5;
    currentMax = currentMax ? currentMax : 50;
    $( "#slider-range" ).slider({
      range: true,
      min: parseInt($('#variables').attr('data-min-size')),
      max: parseInt($('#variables').attr('data-max-size')),
      values: [ currentMin, currentMax ],
      slide: function( event, ui ) {
      	if ( (ui.values[0] + 12) >= ui.values[1] ) {
            return false;
        }
        $( "#size" ).val( ui.values[ 0 ]  + "K - " + ui.values[ 1 ] +"K");
        $('#min-size').val(ui.values[ 0 ]);
        $('#max-size').val(ui.values[ 1 ]);
      }
    });
    $( "#size" ).val($( "#slider-range" ).slider( "values", 0 ) +
      "К - " + $( "#slider-range" ).slider( "values", 1 ) +"К" );
});
</script>