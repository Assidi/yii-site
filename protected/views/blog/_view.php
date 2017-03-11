<?php
/* @var $this BlogController */
/* @var $data Blog */
//$thistags=$data->getTags();
?>

<div class="view">
    <?php// print_r($thistags);?>
    
    <div class="fanf-title">
        <?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->postId)); ?>        
    </div>
    
    <div class="blog-date">
        Опубликовано: <?php echo CHtml::encode(AssidiHelper::dateFormat($data->date)); ?>
    </div>   
	
	<?php echo CHtml::encode($data->text); ?>
	<br />


</div>