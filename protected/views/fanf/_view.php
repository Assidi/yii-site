<?php
/* @var $this FanfController */
/* @var $data Fanf */
    
?>

<div class="view">    
    
    <div class="fanf-title">
    <?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->ficId)); ?>
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
              <?= '<a href="/fandom/'. $fandom->fandomId . '">'. $fandom->fandomName.'</a>'; ?>  
            <?php
        }
    ?>
    <br />
    
    <span class="bold">Жанр: </span>
        <?php        
        foreach($data->getGenres() as $genre) {
            ?>
              <?= '<a href="/genre/'. $genre->genreId . '">'. $genre->genreName.'</a>'; ?>  
            <?php
        }
    ?>
    <br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode(AssidiHelper::getSize($data->size)); ?>
	<br />
    
    <?php echo CHtml::encode($data->summary); ?>
	<br />
    
	<?php 
    /*
    <b><?php echo CHtml::encode($data->getAttributeLabel('ficId')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ficId), array('view', 'id'=>$data->ficId)); ?>
	<br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('month')); ?>:</b>
	<?php echo CHtml::encode($data->month); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datePublish')); ?>:</b>
	<?php echo AssidiHelper::dateFormat($data->datePublish); ?>
	<br />
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('pairing')); ?>:</b>
	<?php echo CHtml::encode($data->pairing); ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('note')); ?>:</b>
	<?php echo CHtml::encode($data->note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dedication')); ?>:</b>
	<?php echo CHtml::encode($data->dedication); ?>
	<br />

	

	<b><?php echo CHtml::encode($data->getAttributeLabel('beta')); ?>:</b>
	<?php echo CHtml::encode($data->beta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coauthor')); ?>:</b>
	<?php echo CHtml::encode($data->coauthor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category')); ?>:</b>
	<?php echo CHtml::encode($data->category); ?>
	<br />

	*/ ?>

</div>