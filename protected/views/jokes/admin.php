<?php
/* @var $this JokesController */
/* @var $model Jokes */

$this->breadcrumbs=array(
	'Приколы'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#jokes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление</h1>

<p>
Вы можете воспользоваться операторами сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) в начале каждого поля поиска.
</p>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'jokes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'jokeId',
		'jokeText',
		array(
			'class'=>'CButtonColumn',
		),
	),
    'cssFile'=>'grid.css',
    'pager' => array(
    'cssFile'=>'main.css',    
     'nextPageLabel' => 'След.',
     'prevPageLabel' => 'Пред.',
     'firstPageLabel' => 'Первая',
     'lastPageLabel' => 'Последняя',
     'header' => '',
     'maxButtonCount'=>5,
     ),
)); ?>
