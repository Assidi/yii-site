<?php
/* @var $this FanfController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fanfs',
);

$this->menu=array(
	array('label'=>'Create Fanf', 'url'=>array('create')),
	array('label'=>'Manage Fanf', 'url'=>array('admin')),
);
?>

<h1>Fanfs</h1>
<?php foreach($searchedModels as $searchedModel): ?>
	<?= $searchedModel->title; ?><br>
	Жанры: <br>
		<?php foreach($searchedModel->getGenres() as $genreModel): ?>
			<?= $genreModel->genreName; ?><br>
		<?php endforeach; ?>
		<hr>
<?php endforeach; ?>
<?php
	//print_r($searchedModels);
    //print_r($models);
    //echo '<br />';
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
