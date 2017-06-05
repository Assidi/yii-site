<?php
/* @var $this FanfController */
/* @var $model Fanf */

$this->breadcrumbs=array(
	'Тексты'=>array('index'),
	$model->title,
);

if (!Yii::app()->user->isGuest) {
    // меню для администратора
    $this->menu=array(
	array('label'=>'Все фанфики', 'url'=>array('index')),
	array('label'=>'Создать фанфик', 'url'=>array('create')),
	array('label'=>'Обновить фанфик', 'url'=>array('update', 'id'=>$model->ficId)),
    array('label'=>'Добавить персонажей', 'url'=>array('viewupdate', 'id'=>$model->ficId)),
	array('label'=>'Удалить фанфик', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ficId),'confirm'=>'Вы действительно хотите удалить этот элемент?')),
	array('label'=>'Управление фанфиками', 'url'=>array('admin')),
    );
}
// а гостю меню в просмотре фанфиков не положено, пусть обратно по хлебным крошкам идет


?>

<h1><?php echo $model->title; ?></h1>


<div class="full-text-head">
    
    <p><span class="bold">Фандом: </span>
        <?php
        
        
        foreach($model->getFandoms() as $fandom) {
            ?>
              <?= '<a href="/fanf/search?fandoms[]='. $fandom->fandomId . '">'. $fandom->fandomName.'</a>'; ?>  
            <?php
        }
    ?>
    </p>
    
    <p><span class="bold">Персонажи: </span><?= $model->pairing?></p>
    <p><span class="bold">Рейтинг: </span><?= $model->raiting?></p>
    <p><span class="bold">Категория: </span><?= $model->category?></p>
    <p><span class="bold">Жанр: </span>
        <?php        
        foreach($model->getGenres() as $genre) {
            ?>
              <?= '<a href="/fanf/search?genres[]='. $genre->genreId . '">'. $genre->genreName.'</a>'; ?>  
            <?php
        }
    ?>
    </p>
    
    <?php 
        if ($model->note !="") {
            ?>  
                <p><span class="bold">Примечание: </span><?= $model->note?></p>
            <?php 
        }
    ?>
    <?php 
        if ($model->dedication !="") {
            ?>  
                <p><span class="bold">Посвящение: </span><?= $model->dedication?></p>
            <?php 
        }
    ?>
    <?php 
        if ($model->beta>0) {
            ?>
                <p><span class="bold">Бета: </span><?= $model->getBeta()->betaName?></p>
            <?php  
        } 
    ?>
    
    <?php 
        if ($model->coauthor>0) {
            ?>
                <p><span class="bold">Соавтор: </span><?= $model->getCoauthor()->coauthorName?></p>
            <?php  
        } 
    ?>    
    <p><span class="bold">Написано: </span><?= AssidiHelper::myDate($model->dateWrite)?></p>
    <p><?= $model->summary ?></p>    
    
</div>

<?= $model->text; ?>

<div class="comment-main">
    <h2>Оставить комментарий</h2>
    <?php $this->renderPartial('/comments/_form',array('model'=>$comment,)); ?>
    <?php if ($model->getComments()):?>
        <h2>Комментарии</h2>             
             <?php foreach ($model->getComments() as $thisComments) : ?>
                <article class="comment">
                    <div class="comment-head clearfix">
                        <a href="mailto:<?=$thisComments->email?>" class="name"><?=CHtml::encode($thisComments->name)?></a>
                        <div class="comment-date"><?=AssidiHelper::dateFormat($thisComments->date)?></div>
                    </div>
                    
                    <div class="comment-text"><?=AssidiHelper::insertBreakes(CHtml::encode($thisComments->text))?></div>        
                </article>
             <?php endforeach; ?>     
    <?php endif; ?>
 </div>





