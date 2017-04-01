<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|PT+Sans+Narrow:400,700&subset=cyrillic,cyrillic-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/assidi.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fancybox/jquery.fancybox.min.css">
    
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/jquery/jquery-3.2.0.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fancybox/jquery.fancybox.min.js"></script>
    
    
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
<!-- Общее меню для сайта -->
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Главная', 'url'=>array('/site/index')),                
                array('label'=>'Тексты', 'url'=>array('/fanf/index')),
                array('label'=>'Рисунки', 'url'=>array('/categories/list')),
                array('label'=>'Блог', 'url'=>array('/blog/index')),
				array('label'=>'Обо мне', 'url'=>array('/site/page', 'view'=>'about')),				
                array('label'=>'Гостевая книга', 'url'=>array('/guestbook/index')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				
			),
		)); ?>
	</div><!-- mainmenu -->    
    <? if(!Yii::app()->user->isGuest): ?>
    <!-- Меню для администратора -->
    <div id="adminmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(              
                array('label'=>'Персонажи', 'url'=>array('/characters/index')),
                array('label'=>'Жанры', 'url'=>array('/genre/index')),
                array('label'=>'Фандомы', 'url'=>array('/fandoms/index')),
                array('label'=>'Соавторы', 'url'=>array('/coauthor/index')),
                array('label'=>'Беты', 'url'=>array('/beta/index')), 
                array('label'=>'Приколы', 'url'=>array('/jokes/index')),               
			),
		)); ?>
    </div>
    <div id="adminmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(                
                array('label'=>'Комменты', 'url'=>array('/comments/index')),
                array('label'=>'Тэги', 'url'=>array('/blogTags/index')),               
                array('label'=>'Комменты блога', 'url'=>array('/blogComments/index')), 
                array('label'=>'Разделы картинок', 'url'=>array('/categories/index')),
                array('label'=>'Рисунки', 'url'=>array('/pictures/index')),
                array('label'=>'Новости', 'url'=>array('/news/index')),
			),
		)); ?>
    </div>
<? endif; ?>
	<?php if(isset($this->breadcrumbs)):?>    
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
            'homeLink'=>CHtml::link('Главная',array('site/index')),
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>
    
	<div class="clear"></div>
    <?php if(Yii::app()->params['debug']):?>
        <pre><?php print_r(Yii::app()->params['debug']);?></pre>
    <?php endif; ?>
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
