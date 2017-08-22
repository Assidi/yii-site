<?php

$this->breadcrumbs=array(
	'Рисунки'=>array('list'),
    $category->name,
);

?>

<? if($category): ?>
    <h1> <?= $category->name; ?> </h1>
<? else: ?>
    <p>Раздел не найден</p>
<? endif; ?>

<? if($pictures): ?>
    <? foreach($pictures as $picture): ?>
        <div class="col-md-3 col-sm-6">
            <? $this->renderPartial('/pictures/_view', array(
                'data' => $picture
            )); ?>
        </div>
        
    <? endforeach; ?>
<? else: ?>
    <p>В этом разделе рисунков не найдено</p>
<? endif; ?>

<div class="clear"></div>
