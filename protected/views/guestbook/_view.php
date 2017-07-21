<?php
/* @var $this GuestbookController */
/* @var $data Guestbook */
?>
    
    <article class="comment-guestbook">
        <div class="comment-head clearfix"> 
            <?php if($data->admin): ?>
                <img class="avatar" src="/images/avatar.png"/>
            <?php endif; ?>             
            <span class="name"><?=CHtml::encode($data->name)?></span>
            <div class="comment-date"><?=AssidiHelper::dateFormat($data->date)?></div>
        </div>                    
        <div class="comment-text"><?=CHtml::encode($data->text)?></div>        
    </article>    

