<?php
/* @var $this FanfController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Фанфики',
);
if (!Yii::app()->user->isGuest) {
    // меню для администратора
    $this->menu=array(
    array('label'=>'Статистика', 'url'=>array('statistics')),
	array('label'=>'Создание', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
	array('label'=>'Поиск', 'url'=>array('search')),    
);
}
else {
    // меню для гостя
    $this->menu=array(	
	array('label'=>'Поиск', 'url'=>array('search')),
);
}
?>

<h1>Фанфики</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
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
