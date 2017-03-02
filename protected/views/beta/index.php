<?php
/* @var $this BetaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Беты',
);

$this->menu=array(
	array('label'=>'Создание', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Беты</h1>
<!-- Выводим просто список, их немного, поэтому нам виджет не нужен -->
<p>У нас имеются следующие беты:</p>

<? foreach ($models as $modelBeta): ?>
    <p>
        <a href="<?= $modelBeta->betaId; ?>" class="a-inline"><?= $modelBeta->betaName; ?></a>
    </p>                            
<? endforeach; ?>


