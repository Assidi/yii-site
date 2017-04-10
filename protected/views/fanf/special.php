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
        'character'=>$character,
        'characters'=>$characters,
        'genre'=>$genre,
        'genres'=>$genres,
    ));
?>



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