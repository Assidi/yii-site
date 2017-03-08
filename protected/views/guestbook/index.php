<?php
/* @var $this GuestbookController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Гостевая книга',
);

$this->menu=array(
	array('label'=>'Новая запись', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Гостевая книга</h1>

<? foreach ($models as $modelGuest): ?>
    <article class="comment-guestbook">
        <div class="comment-head clearfix">
            <a href="mailto:<?=$modelGuest->email?>" class="name"><?=$modelGuest->name?></a>
            <div class="comment-date"><?=AssidiHelper::dateFormat($modelGuest->date)?></div>
        </div>                    
        <div class="comment-text"><?=$modelGuest->text?></div>        
    </article>                            
<? endforeach; ?>

