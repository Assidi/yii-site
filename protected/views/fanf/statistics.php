<?php
/* @var $this FanfController */
/* @var $statArray array */

$this->breadcrumbs=array(
	'Фанфики'=>array('index'),
	'Статистика',
);

    $this->menu=array(
    array('label'=>'Все фанфики', 'url'=>array('index')),
	array('label'=>'Создание', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
	array('label'=>'Поиск', 'url'=>array('search')),
);

?>

<h1>Статистика</h1>

<table class="table-characters">
    <tr>
        <th>Год</th>
        <th>Количество текстов</th>
        <th>Общий размер в знаках</th>
    </tr>
    <?php foreach ($statArray as $stat): ?>
        <tr>
            <td><?=$stat['year']; ?></td>
            <td><?=$stat['n'];?></td>
            <td><?=$stat['size'];?></td>
        </tr>
        
    <?php endforeach; ?>
</table> 
