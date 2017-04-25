<?php
/* @var $this PicturesController */
/* @var $data Pictures */
?>

<div class="view-picture">
    <a href="/images/<?=$data->image; ?>" data-fancybox="group" data-caption="<?= CHtml::encode($data->description); ?>">
	<img src="/images/preview/<?=$data->image; ?>" alt="" />
    </a>
    <div class="caption">
	<?php echo CHtml::encode($data->description); ?>
    </div>
	
	
	
</div>