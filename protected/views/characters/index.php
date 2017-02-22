<?php
/* @var $this CharactersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Персонажи',
);

$this->menu=array(
	array('label'=>'Создание', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Персонажи</h1>


    <table class="table-characters">
    <tr>
        <th>Персонаж</th>
        <th>Фандом</th>        
    </tr>    
    <? foreach ($models as $modelCharacter): ?>
        <tr>
        <td><a href="<?= $modelCharacter->characterId; ?>" class="a-inline"><?= $modelCharacter->characterName; ?></a></td>
        <td><?= $modelCharacter->fandom->fandomName; ?></td>
        </tr>                
    <? endforeach; ?>
    </table>

<!--
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
    'pager' => array('pageSize'=>100),
)); ?>
-->