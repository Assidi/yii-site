<?php
/* @var $this GuestbookController */
/* @var $data Guestbook */
?>
    
    <article class="comment-guestbook">
        <div class="comment-head clearfix">            
            <span class="name"><?=CHtml::encode($data->name)?></span>
            <div class="comment-date"><?=AssidiHelper::dateFormat($data->date)?></div>
        </div>                    
        <div class="comment-text"><?=$data->text?></div>        
    </article>    

