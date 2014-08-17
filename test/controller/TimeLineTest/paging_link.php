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

$dom->load($b->do_get(test_map_url('index::index'))->body());
eq(test_map_url('index::page',2),$dom->find('.next',0)->getAttribute('href'));

$dom->load($b->do_get(test_map_url('index::page',2))->body());
eq(test_map_url('index::index'), $dom->find('.prev', 0)->getAttribute('href') );
eq(test_map_url('index::page',3), $dom->find('.next', 0)->getAttribute('href') );

$dom->load($b->do_get(test_map_url('index::page',3))->body());
eq(test_map_url('index::page',2), $dom->find('.prev', 0)->getAttribute('href') );
eq(test_map_url('index::page',4), $dom->find('.next', 0)->getAttribute('href') );
