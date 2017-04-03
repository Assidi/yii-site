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
<?php
    $this->renderPartial('_search_custom',array(
        'model'=>$model,
        'fandom'=>$fandom,
        'fandoms'=>$fandoms,
    ));
?>

<div class="wide form">

<form action ="<?= Yii::app()->createUrl($this->route); ?>" method="get">

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

</form>

</div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$model->customSearch(),
	'itemView'=>'_view',
    'pager' => array(
     'nextPageLabel' => 'Следующая',
     'prevPageLabel' => 'Предыдущая',
     'firstPageLabel' => 'Первая',
     'lastPageLabel' => 'Последняя',
     'header' => 'Страница: '
     ),
	'pagerCssClass' => 'assidi-pagination',
)); ?>

<?php /*
<? if($models): ?>
	<? foreach($models as $model): ?>
		<? $this->renderPartial('/fanf/_view',array(
			'data' => $model,
		)); ?>
	<? endforeach; ?>
<? else: ?>
	<p>Данные для отображения отсутствуют</p>
<? endif; ?>
*/
?>