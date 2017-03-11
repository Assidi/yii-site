<?php
/* @var $this GuestbookController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Гостевая книга',
);

if (!Yii::app()->user->isGuest) {
    // меню для администратора
    $this->menu=array(
	array('label'=>'Новая запись', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
}
else {
    // меню для гостя
    $this->menu=array(	
	array('label'=>'Новая запись', 'url'=>array('create')),
);
}


?>

<h1>Гостевая книга</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'pagerCssClass' => 'assidi-pagination',
)); ?>

