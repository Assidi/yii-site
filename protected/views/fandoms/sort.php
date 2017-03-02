<? if($fandom): ?>
    <h1>Фандом: <?= $fandom->fandomName; ?></h1>
<? else: ?>
    <p>Фандом не найден.</p>
<? endif; ?>

<? if($fanfs): ?>
    <? foreach($fanfs as $fanf): ?>
        <? $this->renderPartial('/fanf/_view', array(
            'data' => $fanf
        )); ?>
    <? endforeach; ?>
<? else: ?>
    <p>Фанфики по этому фандому отсутствуют.</p>
<? endif; ?>