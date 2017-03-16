<?php
/* @var $this FanfController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Тексты',
);
if (!Yii::app()->user->isGuest) {
    // меню для администратора
    $this->menu=array(
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

<h1>Тексты</h1>
<?php
    //print_r($models);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'pagerCssClass' => 'assidi-pagination',
)); ?>
