<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="ru">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$this->description;?>">
    <meta name="keywords" content="<?=AssidiHelper::arrayToString($this->keywords);?>">
    <meta name="author" content="Ассиди">
    <meta name="copyright" content="Все права принадлежат Ассиди Эльконнэри">

	<!-- blueprint CSS framework -->
	
	
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|PT+Sans+Narrow:400,700&subset=cyrillic,cyrillic-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Marck+Script&amp;subset=cyrillic" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/bootstrap/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/assidi.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/grid.css">
    
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/jquery/jquery-3.2.0.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/fancybox/jquery.fancybox.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/bootstrap/bootstrap.min.js"></script>
    
    
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php"><img class="image-logo" src="<?php echo Yii::app()->request->baseUrl; ?>/images/sunriselogo.svg" /></a>            
            <?php echo CHtml::encode(Yii::app()->name); ?>
        </div>
	</div><!-- header -->

	
    <? if(!Yii::app()->user->isGuest && $this->adminmenu): ?>
    <!-- Меню для администратора -->
    <div id="adminmenu" >
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(              
                array('label'=>'Персонажи', 'url'=>array('/characters/index')),
                array('label'=>'Жанры', 'url'=>array('/genre/index')),
                array('label'=>'Фандомы', 'url'=>array('/fandoms/index')),
                array('label'=>'Соавторы', 'url'=>array('/coauthor/index')),
                array('label'=>'Беты', 'url'=>array('/beta/index')), 
                array('label'=>'Приколы', 'url'=>array('/jokes/index')),
                array('label'=>'Вопросы', 'url'=>array('/questions/index')),
                               
			),
		)); ?>
    </div>
    <div id="adminmenu" >
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
    <? else: ?>
    
    <!-- Общее меню для сайта -->
    <nav class="navbar navbar-default top-menu">  
        <div class="container-fluid">    
          <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>          
          </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div id="mainmenu">
        		<?php $this->widget('zii.widgets.CMenu',array(
        			'items'=>array(
        				array('label'=>'Главная', 'url'=>array('/site/index')),                
                        array('label'=>'Фанфики', 'url'=>array('/fanf/index')),
                        array('label'=>'Поиск фиков', 'url'=>array('/fanf/search')),
                        array('label'=>'Рисунки', 'url'=>array('/categories/list')),
                        array('label'=>'Блог', 'url'=>array('/blog/index')),
        				array('label'=>'Обо мне', 'url'=>array('/site/page', 'view'=>'about')),				
                        array('label'=>'Гостевая книга', 'url'=>array('/guestbook/index')),
                        array('label'=>'Админка', 'url'=>array('/news/index'), 'visible'=>!Yii::app()->user->isGuest),				
                        array('label'=>'Выход', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),        				
        			),
                    'htmlOptions' => array(
                  'class' => 'nav navbar-nav')
        		)); ?>
	       </div><!-- mainmenu -->   
            
      </div>
      </div><!-- /.container-fluid -->
    </nav>
    
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
	<footer>
        <div class="row">
            <div class="copyright col-sm-4">
                &copy; <?php echo date('Y'); ?> Ассиди Эльконнэри<br/>
        		Все права зарезервированы<br/>
        		<?php echo Yii::powered(); ?><br />
                При поддержке <a href="http://screencast.ru/school/">Screencast School</a>
            </div>
            <div class="social col-sm-8">
                <ul>
                    <li><a href="https://vk.com/id1149997" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/vk.png"/></a></li>
                    <li><a href="https://www.facebook.com/profile.php?id=100007680033589" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/facebook.png"/></a></li>
                    <li><a href="http://assidi.livejournal.com/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/livej.png"/></a></li>
                    <li><a href="https://www.instagram.com/assidi_elkonnery/" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/inst.png"/></a></li>
                    <li><a href="https://fotki.yandex.ru/users/assidi" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/yandex.png"/></a></li>
                    <li><a href="https://www.youtube.com/channel/UCSURocoFKliGscU56OMMzYw" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/youtube.png"/></a></li>
                </ul>
            </div>
        </div>
        
		
        
	</footer><!-- footer -->

</div><!-- page -->

</body>
</html>
