<?php
/* @var $this FanfController */
/* @var $model Fanf */

$this->breadcrumbs=array(
	'Тексты'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Все фанфики', 'url'=>array('index')),
	array('label'=>'Создать фанфик', 'url'=>array('create')),
    array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->ficId)),
	array('label'=>'Обновить фанфик', 'url'=>array('update', 'id'=>$model->ficId)),
	array('label'=>'Удалить фанфик', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ficId),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление фанфиками', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->title; ?></h1>


<div class="full-text-head">        
    
    <h3>Удаление фандомов</h3>
    <? foreach ($model->getFandoms() as $fanfanId => $fandom): ?>        
        <a href="/fanf/deletefandom/<?= $fanfanId; ?>"><?= $fandom->fandomName; ?></a><br>
    <? endforeach; ?>
    
    <? if($model->getCharacters()): ?>
    <h3>Удаление персонажей</h3>
    <? foreach ($model->getCharacters() as $charfanfId => $character): ?>
        <a href="/fanf/deletecharacter/<?= $charfanfId; ?>"><?= $character->characterName; ?></a><br>
    <? endforeach; ?>
<? endif; ?>
        
    <h3>Удаление жанров</h3>   
   
    <? foreach ($model->getGenres() as $genreFanficId => $genre): ?>        
        <a href="/fanf/deletegenre/<?= $genreFanficId; ?>"><?= $genre->genreName; ?></a><br>
    <? endforeach; ?>
    
</div>

<form action="" method="post">
    <p>Добавить персонажа</p>
    <?php
        $fandomIds = array();
        foreach($model->getFandoms() as $fandom) {
            $fandomIds[] = $fandom->fandomId;
        }    
    ?>
    <?= CHtml::dropDownList('characterId', '', Characters::getCustomList($fandomIds)); ?>
    <input type="submit" value="Добавить"/>
</form>
<p></p>
<form action="" method="post">
    <p>Добавить фандом</p>
    <?= CHtml::dropDownList('fandomId', '', Fandoms::getList()); ?>
    <input type="submit" value="Добавить"/>
</form>
<p></p>
<form action="" method="post">
    <p>Добавить жанр</p>
    <?= CHtml::dropDownList('genreId', '', Genre::getList()); ?>
    <input type="submit" value="Добавить"/>
</form>


