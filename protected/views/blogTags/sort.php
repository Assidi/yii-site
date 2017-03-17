<h1>Блог</h1>

<? if($tag): ?>
    Записи с тэгом: <?= $tag->tagName; ?>
<? else: ?>
    <p>Тэг не найден</p>
<? endif; ?>

<? if($blog): ?>
    <? foreach($blog as $post): ?>
        <? $this->renderPartial('/blog/_view', array(
            'data' => $post
        )); ?>
    <? endforeach; ?>
<? else: ?>
    <p>По этому тэгу записи не найдены</p>
<? endif; ?>