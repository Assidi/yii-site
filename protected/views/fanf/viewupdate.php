<?php
/* @var $this FanfController */
/* @var $model Fanf */

$this->breadcrumbs=array(
	'Фанфики'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Все фанфики', 'url'=>array('index')),
	array('label'=>'Создать фанфик', 'url'=>array('create')),
	array('label'=>'Обновить фанфик', 'url'=>array('update', 'id'=>$model->ficId)),
	array('label'=>'Удалить фанфик', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ficId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление фанфиками', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->title; ?></h1>


<div class="full-text-head">
    
    <p><span class="bold">Фандом: </span>
        <?php
        
        
        foreach($model->getFandoms() as $fandom) {
            ?>
              <?= '<a href="/fandom/'. $fandom->fandomId . '">'. $fandom->fandomName.'</a>'; ?>  
            <?php
        }
    ?>
    </p>
    
    <?php
        if($model->getCharacters()) {
			?><span class="bold">Персонажи:</span><?php
            foreach ($model->getCharacters() as $character) {
                ?>                 
                <?= $character->characterName.", "; ?>
                <?php
            }
        }
    ?>
    
    <? if($model->getCharacters()): ?>
    <h3>Удаление персонажей</h3>
    <? foreach ($model->getCharacters() as $charfanfId => $character): ?>
        <a href="/fanf/deletecharacter/<?= $charfanfId; ?>"><?= $character->characterName; ?></a><br>
    <? endforeach; ?>
<? endif; ?>
    
    <p><span class="bold">Персонажи: </span><?= $model->pairing?></p>
    <p><span class="bold">Рейтинг: </span><?= $model->raiting?></p>
    <p><span class="bold">Категория: </span><?= $model->category?></p>
    <p><span class="bold">Жанр: </span>
        <?php        
        foreach($model->getGenres() as $genre) {
            ?>
              <?= '<a href="/genre/'. $genre->genreId . '">'. $genre->genreName.'</a>'; ?>  
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
    <p><span class="bold">Написано: </span><?= $model->dateWrite?></p>    
    
</div>

<form action="" method="post">
    <?= CHtml::dropDownList('characterId', '', Characters::getList()); ?>
    <input type="submit" value="Добавить"/>
</form>



