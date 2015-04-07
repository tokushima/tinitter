<?php
/**
 * ページングのリンク先が正しいか
 */
for($i=0;$i<35;$i++){
	$post = new \model\Posts();
	$post->nickname('nickname');
	$post->body('body');
	$post->save();
}
$b = new \ebi\Browser();
$dom = new \PHPHtmlParser\Dom();

$dom->load($b->do_get(url('index::index'))->body());
eq(url('index::page',2),$dom->find('.next',0)->getAttribute('href'));

$dom->load($b->do_get(url('index::page',2))->body());
eq(url('index::index'), $dom->find('.prev', 0)->getAttribute('href') );
eq(url('index::page',3), $dom->find('.next', 0)->getAttribute('href') );

$dom->load($b->do_get(url('index::page',3))->body());
eq(url('index::page',2), $dom->find('.prev', 0)->getAttribute('href') );
eq(url('index::page',4), $dom->find('.next', 0)->getAttribute('href') );
