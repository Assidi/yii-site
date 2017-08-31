<?php
/* @var $this FanfController */
/* @var $model Fanf */
/* @var $form CActiveForm */

$this->breadcrumbs=array(
	'Тексты'=>array('index'),
	'Поиск',
);
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>	

	<div class="form-group">
		<?php echo $form->label($model,'title'); ?><br />
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'dateWrite'); ?><br />
		<?php echo $form->textField($model,'dateWrite'); ?>
	</div>	

	<div class="form-group">
		<?php echo $form->label($model,'raiting'); ?><br />
		  <div class="radio-item">
            <input id="Fanf_raiting_0" value="G" name="Fanf[raiting]" type="radio">
            <label for="Fanf_raiting_0">G</label>             
          </div>
          <div class="radio-item">
            <input id="Fanf_raiting_1" value="PG" name="Fanf[raiting]" type="radio">
            <label for="Fanf_raiting_1">PG</label>                       
          </div>
          <div class="radio-item">
            <input id="Fanf_raiting_2" value="PG-13" name="Fanf[raiting]" type="radio">
            <label for="Fanf_raiting_2">PG-13</label>            
          </div>
          <div class="radio-item">
            <input id="Fanf_raiting_3" value="R" name="Fanf[raiting]" type="radio">
            <label for="Fanf_raiting_3">R</label>            
          </div>
          <div class="radio-item">
            <input id="Fanf_raiting_4" value="NC-17" name="Fanf[raiting]" type="radio">
            <label for="Fanf_raiting_4">NC-17</label>
          </div>
	</div>    
    

	<div class="form-group">
		<?php echo $form->label($model,'summary'); ?><br />
		<?php echo $form->textField($model,'summary',array('size'=>60,'maxlength'=>500)); ?>
	</div>	

	<div class="form-group">
        <label>Размер</label><br />
        От <input type="text" name="Fanf[minSize]" id="size" value="0"/>
        до <input type="text" name="Fanf[maxSize]" id="size" value="<?=Fanf::maxSize();?>"/>
        тыс. знаков
		
	</div>	

	<div class="form-group">
		<?php echo $form->label($model,'category'); ?><br />
        <div class="radio-item">
            <input id="Fanf_category_0" value="Джен" name="Fanf[category]" type="radio">
            <label for="Fanf_category_0">Джен</label>
        </div>
        <div class="radio-item">
            <input id="Fanf_category_1" value="Гет" name="Fanf[category]" type="radio">
            <label for="Fanf_category_1">Гет</label>
        </div>
        <div class="radio-item">
            <input id="Fanf_category_2" value="Слэш" name="Fanf[category]" type="radio">
            <label for="Fanf_category_2">Слэш</label>
        </div>
        <div class="radio-item">
            <input id="Fanf_category_3" value="Фемслэш" name="Fanf[category]" type="radio">
            <label for="Fanf_category_3">Фемслэш</label>
        </div>        
		
	</div>

	<div class="form-group">
		<?php echo $form->label($model,'text'); ?><br />
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
	</div>
    
    <div class="form-group">
		<label for="fandoms">Фандомы</label>
		<?= CHtml::dropDownList('fandoms[]', $fandom, $fandoms); ?>
	</div>
    
    <div class="form-group">
		<label for="characters">Персонажи</label><br />
		<?= CHtml::dropDownList('characters[]', $character, $characters,array('multiple'=>true)); ?>
	</div>
	
	<div class="form-group">
		<label for="genres">Жанры</label><br />
		<?= CHtml::checkBoxList('genres[]', $genre, AssidiHelper::deletenull(Genre::getList())); ?>
	</div>

	<div class="form-group">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->

<script>
$(document).ready(function() {


    $('#fandoms').on('change',function(){
      var fandomId = $("#fandoms option:selected").val();
      $.ajax({
        url: "/characters/ajaxlist/"+fandomId,
        dataType: "json"
      }).done(function(data) {
        var str = '';
        // сейчас будет самое страшное - преобразование json объекта в массив и его сортировка
        var array=[];
        //Это мы делаем двумерный массив 
        for(var k in data) {
            var v = data[k];
            array.push([k, v]);
        }
        // а теперь мы его отсортируем
        // Функция сортировки по второму элементу массива
        function s2(a, b) {
            if (a[1] > b[1]) return 1;
            else if (a[1] < b[1]) return -1; else return 0;
            }
        // отсортировали    
        array.sort(s2);
        // теперь поехали составлять список 
        var a=[];
        for(var i=0; i<array.length; i++) {
            a= array[i];
            str+="<option value='" + a[0] + "'>" + a[1] + "</option>";
        }
        //$.each(data, function( index, value ) {
        //  str += '<option value="'+index+'">'+value+'</option>';
        //});
        $('#characters').html(str);
      });
    });
});
</script>