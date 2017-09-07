<?php
/* @var $this GuestbookController */
/* @var $model Guestbook */

$this->breadcrumbs=array(
	'Гостевая книга'=>array('index'),
	'Новая запись',
);



if (!Yii::app()->user->isGuest) {
    // меню для администратора
    $this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
}
else {
    // меню для гостя
    $this->menu=array(	
	array('label'=>'Список', 'url'=>array('index')),
);
}

?>




    <h1>Новая запись</h1>

    <?php $this->renderPartial('_form', array('model'=>$model)); ?>


