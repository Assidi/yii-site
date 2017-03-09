<?php
/* @var $this GuestbookController */
/* @var $data Guestbook */
?>
    
    <article class="comment-guestbook">
        <div class="comment-head clearfix">
            <a href="mailto:<?=$data->email?>" class="name"><?=$data->name?></a>
            <div class="comment-date"><?=AssidiHelper::dateFormat($data->date)?></div>
        </div>                    
        <div class="comment-text"><?=$data->text?></div>        
    </article>    

