<?php
/* @var $this QuestionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Вопросы',
);

$this->menu=array(
	array('label'=>'Новый вопрос', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Вопросы для капчи</h1>

<? foreach ($models as $model): ?>
    <div class="view">
        <p><b>Номер: </b><a href="<?=$model->id;?>"><?=$model->id;?></a></p>
        <p><b>Вопрос: </b><?=$model->question;?></p>
        <p><b>Ответ: </b><?=$model->answer;?></p>
    </div>    
<? endforeach; ?>

<br />
