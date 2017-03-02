<?php
/* @var $this GenreController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Жанры',
);

$this->menu=array(
	array('label'=>'Создание', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Жанры</h1>

<!-- Выводим просто список, их немного, поэтому нам виджет не нужен -->
<p>У нас имеются следующие жанры:</p>

<? foreach ($models as $modelGenre): ?>
    <p>
        <a href="<?= $modelGenre->genreId; ?>" class="a-inline"><?= $modelGenre->genreName; ?></a>
    </p>                            
<? endforeach; ?>

