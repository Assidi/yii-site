<? if($genre): ?>
    <h1>Жанр: <?= $genre->genreName; ?></h1>
<? else: ?>
    <p>Жанр не найден.</p>
<? endif; ?>
    
<? if($fanfs): ?>
    <? foreach($fanfs as $fanf): ?>
        <? $this->renderPartial('/fanf/_view', array(
            'data' => $fanf
        )); ?>
    <? endforeach; ?>
<? else: ?>
    <p>Фанфы с данным жанром отсутствуют.</p>
<? endif; ?>