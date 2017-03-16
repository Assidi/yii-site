<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="mymenu">
    <?php
			$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));	
	?>
</div>

<div id="content">
	<?php echo $content; ?>
</div><!-- content -->

<?php $this->endContent(); ?>