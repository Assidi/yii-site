<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Мои поздравления! Мы успешно установили Yii, правда, пока не знаем, что делать дальше :) </p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>


<?php
    //$joke = Jokes::model()->randJoke()
    $jokesAll = Jokes::model()->findAll();
    
    //print_r($jokesAll);
    //echo "<br />";
    $n = count($jokesAll);
    //echo "<p>Количество приколов в базе: ".$n."</p>";
    $i = mt_rand(0, $n-1);
    //echo 'Номер '.$i.'<br />';
    
    $jokes = array();
    
    foreach ($jokesAll as $jokerow) {
        $jokes[] = $jokerow->jokeText;
    }
    
    $joke = $jokes[$i];
    $joke = preg_replace('/[\r\n]+/', "<br />", $joke);
    echo '<p>'.$joke.'</p>';
    
    
    
?>