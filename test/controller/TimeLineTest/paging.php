<?php
/**
 * ページングの計算が誤っていないか
 */
for($i=0;$i<105;$i++){
	$post = new \model\Posts();
	$post->nickname('nickname');
	$post->body('body');
	$post->save();
}

$b = new \ebi\Browser();
$dom = new \PHPHtmlParser\Dom();

$dom->load($b->do_get(test_map_url('index::page',1))->body());
eq(10, count($dom->find('.postcell')) );

$dom->load($b->do_get(test_map_url('index::page',11))->body());
eq(5, count($dom->find('.postcell')) );

$dom->load($b->do_get(test_map_url('index::page',100))->body());
eq(0, count($dom->find('.postcell')) );
