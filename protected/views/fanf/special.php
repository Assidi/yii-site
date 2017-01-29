<?php
/* @var $this FanfController */
/* @var $models array of Fanf */
/* @var $character */
/* @var characters */
/* @var fandom */
/* @var fandoms */
/* @var genre */
/* @var genres */
?>

<div class="wide form">

<form action ="<?= Yii::app()->createUrl($this->route); ?>" method="get">

	<div class="row">
		<label for="fandoms">Фандомы</label>
		<?= CHtml::dropDownList('fandoms[]', $fandom, $fandoms); ?>
	</div>
	
	<div class="row">
		<label for="characters">Герои</label>
		<?= CHtml::dropDownList('characters[]', $character, $characters); ?>
	</div>
	
	<div class="row">
		<label for="genres">Жанры</label>
		<?= CHtml::dropDownList('genres[]', $genre, $genres); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

</form>

</div>

<? if($models): ?>
	<? foreach($models as $model): ?>
		<? $this->renderPartial('/fanf/_view',array(
			'data' => $model,
		)); ?>
	<? endforeach; ?>
<? else: ?>
	<p>Данные для отображения отсутствуют</p>
<? endif; ?>