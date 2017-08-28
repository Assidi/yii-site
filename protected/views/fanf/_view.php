<?php
/* @var $this FanfController */
/* @var $data Fanf */
?>

<div class="view">

	<div class="fanf-title">
    <?php echo CHtml::link(CHtml::encode($data->title), array('fanf/view', 'id'=>$data->ficId), array('target'=>'blank')); ?>
    </div>	
    
	
    <b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('raiting')); ?>:</b>
	<?php echo CHtml::encode($data->raiting); ?>
	<br />    
    
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('pairing')); ?>:</b>
	<?php echo CHtml::encode($data->pairing); ?>
	<br />
    
    <span class="bold">Фандом: </span>
        <?php
        foreach($data->getFandoms() as $fandom) {
            ?>
              <?= '<a href="/fanf/search?fandoms[]='. $fandom->fandomId . '">'. $fandom->fandomName.'</a>'; ?>  
            <?php
        }
    ?>
    <br />
    
    <span class="bold">Жанр: </span>
        <?php        
        foreach($data->getGenres() as $genre) {
            ?>
              <?= '<a href="/fanf/search?genres[]='. $genre->genreId . '">'. $genre->genreName.'</a>'; ?>  
            <?php
        }
    ?>
    <br />  
    
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode(AssidiHelper::getSize($data->size)); ?>
	<br />
    
    <?php echo $data->summary; ?>
	<br />

</div>