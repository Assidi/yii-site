<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Добро пожаловать на <?php echo CHtml::encode(Yii::app()->name); ?></h1>

<p>Приветствую вас на моей домашней страничке! Меня зовут Ассиди, я ролевик, толкинист, фанфикер 
и на этом сайте я собрала все свое творчество за время моего пребывания в фэндоме. В 
отличие от предыдущей версии моего сайта, здесь можно оставлять комментарии не только в гостевой книге 
(которая, кстати, теперь находится не на стороннем ресурсе, а здесь же и никуда не исчезнет),
но и под каждым текстом, а так же можно комментировать записи блога. </p>
<p>Помните, что неконструктивные комментарии будут удаляться без объяснения причин!</p>


<h2>Новости сайта</h2>
<div class="view">
    <? $new = News::lastNews();?>
    <p><i><?=AssidiHelper::dateFormat($new->date) ?></i></p>
    <p><?=AssidiHelper::insertBreakes($new->text);?></p>
</div>

<h2>Последний текст</h2>
    <?php
        $this->renderPartial('/fanf/_view',array(
        'data'=>Fanf::lastFanf(),            
        )); ?>       
        
<h2>Последняя запись в блоге</h2>
     <?php
        $this->renderPartial('/blog/_view',array(
        'data'=>Blog::lastPost(),            
        )); ?>  

<h2>Улыбнитесь!</h2>
<div class="view">
    <p><?=Jokes::getRandJoke();?></p>
</div>



