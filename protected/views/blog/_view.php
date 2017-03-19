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
	<p>
    <?php echo $data->cutText(); ?>
    </p>
	
	<p>
<? foreach($data->getTags() as $tagid=>$tagname):?>
    <?= '<a href="/blogTags/sort/'. $tagid . '">'. $tagname.'</a>'; ?>
<? endforeach?>
</p>
    

</div>