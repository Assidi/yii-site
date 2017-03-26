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
        <? $this->renderPartial('/pictures/_view', array(
            'data' => $picture
        )); ?>
    <? endforeach; ?>
<? else: ?>
    <p>В этом разделе рисунков не найдено</p>
<? endif; ?>

