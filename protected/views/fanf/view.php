<?php
/* @var $this FanfController */
/* @var $model Fanf */

$this->breadcrumbs=array(
	'Fanfs'=>array('index'),
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
<?php
    //print_r($model);
    //echo "<p></p>";
    $date = $model->month.'.'.$model->year;
?>

<div class="full-text-head">
    <?php 
        if ($model->beta>0) {
            ?>
                <p><span class="bold">Бета: </span><?= $model->beta?></p>
            <?php  
        } 
    ?>
    <?php 
        if ($model->coauthor>0) {
            ?>
                <p><span class="bold">Соавтор: </span><?= $model->coauthor?></p>
            <?php  
        } 
    ?>    
    <p><span class="bold">Персонажи: </span><?= $model->pairing?></p>
    <p><span class="bold">Рейтинг: </span><?= $model->raiting?></p>
    <p><span class="bold">Категория: </span><?= $model->category?></p>
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
    <p><span class="bold">Написано: </span><?= $date?></p>    
    
</div>

<?= $model->text; ?>

<?php 
/**
 * $this->widget('zii.widgets.CDetailView', array(
 * 	'data'=>$model,
 * 	'attributes'=>array(
 * 		'ficId',		
 * 		'title',
 * 		'year',
 * 		'month',
 * 		'datePublish',
 * 		'raiting',
 * 		'pairing',
 * 		'summary',
 * 		'note',
 * 		'dedication',
 * 		'size',
 * 		'beta',
 * 		'coauthor',
 * 		'category',
 *         'text'
 * 	),
 * )); 
 */
?>
