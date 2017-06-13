<?php
/* @var $this BlogController */
/* @var $model Blog */

$this->breadcrumbs=array(
	'Блог'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Новая запись', 'url'=>array('create')),
	array('label'=>'Обновить', 'url'=>array('update', 'id'=>$model->postId)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->postId),'confirm'=>'Вы действительно хотите удалить этот элемент?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1><?=$model->title; ?></h1>
<p><i>Опубликовано: <?=AssidiHelper::dateFormat($model->date) ?></i></p>
<p>
<?=AssidiHelper::insertBreakes($model->text)?>
</p>
<p>
<? foreach($model->getTags() as $id=>$name):?>
    <?= '<a href="/blogTags/sort/'. $id . '">'. $name.'</a>'; ?>
<? endforeach?>
</p>

<div class="comment-main">
    <h2>Оставить комментарий</h2>
    <?php $this->renderPartial('/blogComments/_form',array('model'=>$comment,)); ?>
    <?php if ($model->getComments()):?>
        <h2>Комментарии</h2>             
             <?php foreach ($model->getComments() as $thisComments) : ?>
                <article class="comment">
                    <div class="comment-head clearfix"> 
                        <?php if($thisComments->admin): ?>
                            <img class="avatar" src="/images/avatar.png"/>
                        <?php endif; ?>                      
                        <span class="name"><?=CHtml::encode($thisComments->name)?></span>
                        <div class="comment-date"><?=AssidiHelper::dateFormat($thisComments->date)?></div>
                    </div>
                    
                    <div class="comment-text"><?=AssidiHelper::insertBreakes(CHtml::encode($thisComments->text))?></div>        
                </article>
             <?php endforeach; ?>     
    <?php endif; ?>
 </div>

