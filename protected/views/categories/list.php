<?php
/* @var $this CategoriesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Рисунки',
);

$this->menu=array(
	array('label'=>'Создание', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Рисунки</h1>
<!-- Здесь мы выводим список разделов рисунков, по ссылке открываются рисунки этого раздела -->

<? foreach ($models as $modelCat): ?>
    <p>
        
        <?= '<a href="/categories/sort/'. $modelCat->id . '">'. $modelCat->name.'</a>'; ?>
    </p>                            
<? endforeach; ?>

