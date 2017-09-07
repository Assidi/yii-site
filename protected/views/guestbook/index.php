<?php
/* @var $this GuestbookController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Гостевая книга',
);

//Yii::app()->params['debug'] = $_SESSION;

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
<a id="comment-button" href="#">Создать новую запись</a>
<div id="guest-form" style="display: none;" >
    <h2>Новая запись</h2>
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>

<script>
$(document).ready(function () {
    $('a#comment-button').click(function (e) {
    	   $(this).toggleClass('active');
           $('#guest-form').toggle();
           $('a#comment-button').hide();
    	   e.stopPropagation();
	   });
       $('#guest-form').click(function (e) {
	            e.stopPropagation();
       });
       
	   $('body').click(function () {
	       var link = $('a#comment-button');
	       if (link.hasClass('active')) {
                link.click();
                }
	        });
	    });
	 
</script>

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

